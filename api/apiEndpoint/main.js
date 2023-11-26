const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');

const app = express();
const port = 3000;

// Middleware to parse JSON data
app.use(bodyParser.json());

// MySQL Connection
const db = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'matadrugs'
});

db.connect(err => {
  if (err) {
    console.error('Database connection error:', err.message);
  } else {
    console.log('Connected to the database');
  }
});

// Middleware for API key verification
const verifyApiKey = (req, res, next) => {
  const apiKey = req.query.apiKey;
  
  if (apiKey) {
    const sql = 'SELECT * FROM api WHERE api_key = ?';
    db.query(sql, [apiKey], (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        if (results.length > 0) {
          next(); // Valid API key
        } else {
          res.status(401).json({ error: 'Unauthorized - Invalid API key' });
        }
      }
    });
  } else {
    res.status(401).json({ error: 'Unauthorized - API key missing' });
  }
};

// Get all medicines
app.get('/medicines', (req, res) => {
    const sql = 'SELECT * FROM medicine';
    db.query(sql, (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        res.json(results);
      }
    });
  });
  
  // Get a specific medicine by ID
  app.get('/medicines/:id', verifyApiKey, (req, res) => {
    const medicineId = req.params.id;
    const sql = 'SELECT * FROM medicine WHERE MedicineID = ?';
    db.query(sql, [medicineId], (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        if (results.length === 0) {
          res.status(404).json({ error: 'Medicine not found' });
        } else {
          res.json(results[0]);
        }
      }
    });
  });
  
  // Create a new medicine
  app.post('/medicines', verifyApiKey, (req, res) => {
    const { Name, Price, Company, Category, Description, ImageUrl } = req.body;
    const sql = 'INSERT INTO medicine (Name, Price, Company, Category, Description, ImageUrl) VALUES (?, ?, ?, ?, ?, ?)';
    db.query(sql, [Name, Price, Company, Category, Description, ImageUrl], (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        const insertedId = results.insertId;
        res.status(201).json({ id: insertedId, message: 'Medicine created successfully' });
      }
    });
  });
  
  // Update a medicine by ID
  app.put('/medicines/:id', verifyApiKey, (req, res) => {
    const MedicineID = req.params.id;
    const { Name, Price, Company, Category, Description, ImageUrl } = req.body;
    const sql = 'UPDATE medicine SET Name = ?, Price = ?, Company = ?, Category = ?, Description = ?, ImageUrl = ? WHERE MedicineID = ?';
    db.query(sql, [Name, Price, Company, Category, Description, ImageUrl, MedicineID], (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        if (results.affectedRows === 0) {
          res.status(404).json({ error: 'Medicine not found' });
        } else {
          res.json({ message: 'Medicine updated successfully' });
        }
      }
    });
  });
  
  // Delete a medicine by ID
  app.delete('/medicines/:id', verifyApiKey, (req, res) => {
    const medicineId = req.params.id;
    const sql = 'DELETE FROM medicine WHERE MedicineID = ?';
    db.query(sql, [medicineId], (err, results) => {
      if (err) {
        console.error('Error executing query:', err.message);
        res.status(500).json({ error: 'Internal Server Error' });
      } else {
        if (results.affectedRows === 0) {
          res.status(404).json({ error: 'Medicine not found' });
        } else {
          res.json({ message: 'Medicine deleted successfully' });
        }
      }
    });
  });

// Start the server
app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});
