@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="createLeadForm">
                @csrf
                <div class="mb-4">
                    <label for="firstName" class="form-label !text-[.875rem] text-black">First Name</label>
                    <input type="text" class="form-control" name="first_name" id="firstName" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="lastName" class="form-label !text-[.875rem] text-black">Last Name</label>
                    <input type="text" class="form-control" name="last_name" id="lastName" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label !text-[.875rem] text-black">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label !text-[.875rem] text-black">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="pending">Pending</option>
                        <option value="inprogress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="companyId" class="form-label !text-[.875rem] text-black">Company</label>
                    <select class="form-control" id="companyId" name="company_id" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button class="ti-btn ti-btn-primary-full" type="button" onclick="submitForm()">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        // Get form data
        let formData = {
            first_name: document.getElementById('firstName').value,
            last_name: document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            status: document.getElementById('status').value,
            company_id: document.getElementById('companyId').value,
        };

        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/leads', formData)
            .then(function (response) {
                console.log(response.data);
                showSuccessAlert();
                clearForm();
            })
            .catch(function (error) {
                console.error('Error creating lead:', error);
                alert('Failed to create lead. Please check the console for details.');
            });
    }

    function clearForm() {
        // Clear the form fields
        document.getElementById('firstName').value = '';
        document.getElementById('lastName').value = '';
        document.getElementById('email').value = '';
        document.getElementById('status').value = 'pending'; // Reset status to default
        document.getElementById('companyId').value = '';
        // Clear other fields as needed
    }

    function showSuccessAlert() {
        // Create an alert element
        let alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-primary';
        alertDiv.role = 'alert';
        alertDiv.innerText = 'Lead created successfully!';

        // Append the alert to the body
        document.body.appendChild(alertDiv);
    }
</script>

@endsection
