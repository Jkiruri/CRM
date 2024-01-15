
@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
    <form id="createCompanyForm">
    @csrf
    <div class="mb-4">
        <label for="companyName" class="form-label !text-[.875rem] text-black">Company Name</label>
        <input type="text" class="form-control" name="name" id="companyName" placeholder="">
    </div>
    <div class="mb-4">
        <label for="companyEmail" class="form-label !text-[.875rem] text-black">Company Email</label>
        <input type="email" class="form-control" name="email" id="companyEmail" placeholder="">
    </div>
    <div class="mb-4">
        <label for="companyIndustry" class="form-label !text-[.875rem] text-black">Company Industry</label>
        <input type="text" class="form-control" name="industry" id="companyIndustry" placeholder="">
    </div>
    <div class="mb-4">
        <label for="companyPhone" class="form-label !text-[.875rem] text-black">Company Phone Number</label>
        <input type="text" class="form-control" name="phone" id="companyPhone" placeholder="">
    </div>
    
    <button class="ti-btn ti-btn-primary-full" type="button" onclick="submitForm()">Submit</button>
</form>

        </div>
    </div>
</div>

<script>
    function submitForm() {
        // Get form data
        let formData = new FormData(document.getElementById('createCompanyForm'));

        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/companies', formData, {
            headers: {
                'Content-Type': 'multipart/form-data',
            },
        })
        .then(function (response) {
            console.log(response.data);
            alert('Company created successfully!');
            clearForm(); // Clear the form
            showSuccessAlert(); // Show the success alert
        })
        .catch(function (error) {
            console.error('Error creating company:', error);
            alert('Failed to create company. Please check the console for details.');
        });
    }

    function clearForm() {
        // Clear all input fields in the form
        document.getElementById('createCompanyForm').reset();
    }

    function showSuccessAlert() {
        // Display the success alert
        let successAlert = document.createElement('div');
        successAlert.className = 'alert alert-primary shadow-sm';
        successAlert.textContent = 'A company has been created successfully!';

        // Append the alert to the document
        document.body.appendChild(successAlert);

        // Remove the alert after a certain duration (e.g., 5 seconds)
        setTimeout(function () {
            document.body.removeChild(successAlert);
        }, 5000);
    }
</script>

@endsection
