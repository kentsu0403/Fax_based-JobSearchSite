<!-- resources/views/admin/add-company.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会社の追加</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
            box-sizing: border-box;
            position: relative;
            min-height: 100vh; /* Ensure the body takes full viewport height */
        }
        h1 {
            font-size: 28px;
            margin: 0;
            position: absolute;
            top: 20px;
            left: 20px;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 60px); /* Adjust height to center the form */
            margin-top: 60px; /* Adjust top margin for title */
        }
        form {
            display: inline-block;
            text-align: left;
            width: 400px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-size: 16px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            padding: 10px 20px;
            font-size: 16px;
            position: fixed;
            bottom: 20px;
            right: 20px;
        }
        input[type="submit"]:disabled {
            background-color: #b0b0b0;
            cursor: not-allowed;
        }
        input[type="submit"]:hover:not(:disabled) {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>会社の追加</h1>
    <div class="form-container">
        <form id="addCompanyForm" action="{{ route('admin.company.store') }}" method="POST">
            @csrf
            <label for="company_name">会社名:</label>
            <input type="text" id="company_name" name="company_name" required>

            <label for="contact_person">担当者:</label>
            <input type="text" id="contact_person" name="contact_person" required>

            <label for="contact_phone">電話番号:</label>
            <input type="text" id="contact_phone" name="contact_phone" required>

            <input type="submit" value="完了" id="submitButton" disabled>
        </form>
    </div>
    <script>
        const companyName = document.getElementById('company_name');
        const contactPerson = document.getElementById('contact_person');
        const contactPhone = document.getElementById('contact_phone');
        const submitButton = document.getElementById('submitButton');
        const form = document.getElementById('addCompanyForm');

        function validateForm() {
            if (companyName.value && contactPerson.value && contactPhone.value) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }

        companyName.addEventListener('input', validateForm);
        contactPerson.addEventListener('input', validateForm);
        contactPhone.addEventListener('input', validateForm);

        form.addEventListener('submit', function(event) {
            if (submitButton.disabled) {
                event.preventDefault(); // Prevent form submission if button is disabled
            }
        });
    </script>
</body>
</html>
