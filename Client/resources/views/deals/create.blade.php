@extends('app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form id="createDealForm">
                @csrf
                <div class="mb-4">
                    <label for="dealName" class="form-label !text-[.875rem] text-black">Deal Name</label>
                    <input type="text" class="form-control" name="name" id="dealName" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="dealDescription" class="form-label !text-[.875rem] text-black">Deal Description</label>
                    <textarea class="form-control" name="description" id="dealDescription" placeholder=""></textarea>
                </div>
                <div class="mb-4">
                    <label for="dealAmount" class="form-label !text-[.875rem] text-black">Deal Amount</label>
                    <input type="text" class="form-control" name="amount" id="dealAmount" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="dealCompany" class="form-label !text-[.875rem] text-black">Company</label>
                    <select class="form-control" id="dealCompany" name="company_id" required>
                        @foreach ($companies as $company)
                            <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="dealContact" class="form-label !text-[.875rem] text-black">Contact</label>
                    <select class="form-control" id="dealContact" name="contact_id" required>
                        @foreach ($contacts['data'] as $contact)
                            <option value="{{ $contact['id'] }}">{{ $contact['name'] }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="dealClosedDate" class="form-label !text-[.875rem] text-black">Closed Date</label>
                    <input type="date" class="form-control" name="closed_date" id="dealClosedDate" placeholder="">
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
            name: document.getElementById('dealName').value,
            description: document.getElementById('dealDescription').value,
            amount: document.getElementById('dealAmount').value,
            company_id: document.getElementById('dealCompany').value,
            contact_id: document.getElementById('dealContact').value,
            closed_date: document.getElementById('dealClosedDate').value,
        };

        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/deals', formData)
            .then(function (response) {
                console.log(response.data);
                showSuccessAlert();
                clearForm();
            })
            .catch(function (error) {
                console.error('Error creating deal:', error);
                alert('Failed to create deal. Please check the console for details.');
            });
    }

    function clearForm() {
        // Clear the form fields
        document.getElementById('dealName').value = '';
        document.getElementById('dealDescription').value = '';
        document.getElementById('dealAmount').value = '';
        document.getElementById('dealCompany').value = '';
        document.getElementById('dealContact').value = '';
        document.getElementById('dealClosedDate').value = '';
        // Clear other fields as needed
    }

    function showSuccessAlert() {
        // Create an alert element
        let alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-primary';
        alertDiv.role = 'alert';
        alertDiv.innerText = 'Deal created successfully!';

        // Append the alert to the body
        document.body.appendChild(alertDiv);
    }
</script>
@endsection
