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

// 1. List of all users (secure endpoint)
app.get('/users', verifyApiKey, (req, res) => {
  const sql = 'SELECT * FROM users';
  db.query(sql, (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 1b. One user's details by email/id (secure endpoint)
app.get('/users/:identifier', verifyApiKey, (req, res) => {
  const identifier = req.params.identifier;
  const sql = 'SELECT * FROM users WHERE email = ? OR user_id = ?';
  db.query(sql, [identifier, parseInt(identifier)], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      if (results.length > 0) {
        res.json(results[0]);
      } else {
        res.status(404).json({ error: 'User not found' });
      }
    }
  });
});

// 1c. List of all users by gender (secure endpoint)
app.get('/users/gender/:gender', verifyApiKey, (req, res) => {
  const gender = req.params.gender;
  const sql = 'SELECT * FROM users WHERE gender = ?';
  db.query(sql, [gender], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 1d. List of all users who purchased a specific drug, or item in a subcategory/category (secure endpoint)
app.get('/users/purchased/:category/:item', verifyApiKey, (req, res) => {
  const category = req.params.category;
  const item = req.params.item;
  const sql = `
    SELECT users.* 
    FROM users 
    JOIN purchases ON users.user_id = purchases.user_id
    JOIN medicine ON purchases.MedicineID = medicine.MedicineID 
    WHERE medicine.Category = ? AND medicine.Name = ?`;
  db.query(sql, [category, item], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 1e. List of all users who purchased a drug on a specific date (secure endpoint):
app.get('/users/purchased/date/:date', verifyApiKey, (req, res) => {
  const date = req.params.date;
  const sql = `
    SELECT users.* 
    FROM users 
    JOIN purchases ON users.user_id = purchases.user_id 
    WHERE purchases.purchase_date = ?`;
  db.query(sql, [date], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 1f. List of all users by last login time (secure endpoint)
app.get('/users/last-login', verifyApiKey, (req, res) => {
  const sql = 'SELECT * FROM users WHERE last_login IS NOT NULL ORDER BY last_login DESC';
  db.query(sql, (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 2a. List of all medicine/items (insecure endpoint)
app.get('/medicine', (req, res) => {
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

// 2b. Drug information by id (insecure endpoint)
app.get('/medicine/:id', (req, res) => {
  const medicineId = req.params.id;
  const sql = 'SELECT * FROM medicine WHERE MedicineID = ?';
  db.query(sql, [medicineId], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      if (results.length > 0) {
        res.json(results[0]);
      } else {
        res.status(404).json({ error: 'medicine not found' });
      }
    }
  });
});

// 2c. List of all drugs by category/subcategory (insecure endpoint)
app.get('/medicine/category/:category', (req, res) => {
  const category = req.params.category;
  const sql = 'SELECT * FROM medicine WHERE Category = ?';
  db.query(sql, [category], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// 2d. List of drugs by a user [secure endpoint] (insecure endpoint)
app.get('/medicine/user/:userId', (req, res) => {
  const userId = req.params.userId;
  const sql = 'SELECT medicine.* FROM medicine JOIN order_items ON medicine.id = order_items.medicine_id JOIN orders ON order_items.order_id = orders.id WHERE orders.user_id = ?';
  db.query(sql, [userId], (err, results) => {
    if (err) {
      console.error('Error executing query:', err.message);
      res.status(500).json({ error: 'Internal Server Error' });
    } else {
      res.json(results);
    }
  });
});

// Start the server
app.listen(port, () => {
  console.log(`Server listening on port ${port}`);
});
