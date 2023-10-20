<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
</head>

<body class="bg-gray-800 ">
    <?php include('../views/inc/navbar.php'); ?>
    <div class="section-1  flex justify-between m-auto max-w-screen-xl px-4 py-3 border-solid border-2">
        <!-- Details Card -->
        <div class="bg-white m-auto shadow-xl rounded-lg py-3 w-96">

        <div class="p-2">
    <h3 class="text-center text-xl text-gray-900 font-medium leading-8">John Doe</h3>
    <div class="text-center text-gray-400 text-xs font-semibold">
        <p>Patient</p>
    </div>
    <form id="patientForm" action="../public/index.php?action=updatePatientDetails&id=<?php echo $patient['PatientID']; ?>" method="post">
        <table class="text-xm my-3">
            <tbody>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Address</td>
                    <td class="px-2 py-2">
                        <input type="text" value="Chatakpur-3, Dhangadhi Kailali" id="addressField" name="address" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Phone</td>
                    <td class="px-2 py-2">
                        <input type="text" value="+977 9955221114" id="phoneField" name="phone" readonly>
                    </td>
                </tr>
                <tr>
                    <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                    <td class="px-2 py-2">
                        <input type="text" value="john@example.com" id="emailField" name="email" readonly>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="text-center my-3">
            <button id="editButton" type="button" onclick="toggleEdit()">Edit</button>
            <button type="submit" style="display: none;" id="submitButton">Submit</button>
        </div>
    </form>
</div>



</div>
<!-- Credit Card -->
<div class="card mx-auto">
            <div
            class="w-96 h-56 mx-auto bg-red-100 rounded-xl relative text-white shadow-2xl transition-transform transform hover:scale-110">
            
                <img class="relative object-cover w-full h-full rounded-xl" src="https://i.ibb.co/Wkg9JV7/kGkSg1v.png">

                <div class="w-full px-8 absolute top-8">
                    <div class="flex justify-between">
                        <div class="">
                            <p class="font-light">
                                Name
                                </h1>
                            <p class="font-medium tracking-widest">
                                Karthik P
                            </p>
                        </div>
                        <img class="w-14 h-14" src="https://i.ibb.co/FDb2RyH/bbPHJVe.png" />
                    </div>
                    <div class="pt-1">
                        <p class="font-light">
                            Card Number
                            </h1>
                        <p class="font-medium tracking-more-wider">
                            4642 3489 9867 7632
                        </p>
                    </div>
                    <div class="pt-6 pr-6">
                        <div class="flex justify-between">
                            <div class="">
                                <p class="font-light text-xs">
                                    Valid
                                    </h1>
                                <p class="font-medium tracking-wider text-sm">
                                    11/15
                                </p>
                            </div>
                            <div class="">
                                <p class="font-light text-xs text-xs">
                                    Expiry
                                    </h1>
                                <p class="font-medium tracking-wider text-sm">
                                    03/25
                                </p>
                            </div>

                            <div class="">
                                <p class="font-light text-xs">
                                    CVV
                                    </h1>
                                <p class="font-bold tracking-more-wider text-sm">
                                    ···
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <a href="../public/index.php?action=createCard&id=<?php echo $patients['PatientID']; ?>">

                <button type="button"
                class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create
                Card</button>
            </a>
            <button type="button"
            class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Reload</button>
            <button type="button"
                class="mt-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Deposit</button>

        </div>


            <script>
                function toggleEdit() {
                    const addressField = document.getElementById("addressField");
                    const phoneField = document.getElementById("phoneField");
                    const emailField = document.getElementById("emailField");
                    const editButton = document.getElementById("editButton");
                    const submitButton = document.getElementById("submitButton");
            
                    if (addressField.readOnly) {
                        addressField.readOnly = false;
                        phoneField.readOnly = false;
                        emailField.readOnly = false;
                        editButton.style.display = "none";
                        submitButton.style.display = "block";
                    } else {
                        addressField.readOnly = true;
                        phoneField.readOnly = true;
                        emailField.readOnly = true;
                        editButton.style.display = "block";
                        submitButton.style.display = "none";
                    }
                }
            </script>
</body>

</html>