<button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-info ti-btn-icon" data-hs-overlay="#hs-vertically-centered-modal">
    <i class="ri-pencil-line"></i>
</button>

<div id="hs-vertically-centered-modal" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="modal-title text-[1rem] font-semibold">The Makeover Chamber.</h6>
                <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#hs-vertically-centered-modal">
                    <span class="sr-only">Close</span>
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="ti-modal-body px-4">
                <form id="updateCompanyForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="companyName" class="form-label !text-[.875rem] text-black">Company Name</label>
                        <input type="text" class="form-control" name="name" id="updateCompanyName" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="companyEmail" class="form-label !text-[.875rem] text-black">Company Email</label>
                        <input type="email" class="form-control" name="email" id="updateCompanyEmail" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="companyIndustry" class="form-label !text-[.875rem] text-black">Company Industry</label>
                        <input type="text" class="form-control" name="industry" id="updateCompanyIndustry" placeholder="">
                    </div>
                    <div class="mb-4">
                        <label for="companyPhone" class="form-label !text-[.875rem] text-black">Company Phone Number</label>
                        <input type="text" class="form-control" name="phone" id="updateCompanyPhone" placeholder="">
                    </div>
                </form>
            </div>
            <div class="ti-modal-footer">
                <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-secondary-full align-middle" data-hs-overlay="#hs-vertically-centered-modal">
                    Close
                </button>
                <button type="button" class="ti-btn bg-danger text-white !font-medium" onclick="updateCompany({{ $company['id'] }})">Save Changes</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function updateCompany(id) {
    let formData = new FormData(document.getElementById('updateCompanyForm'));
    let sanctumToken = '{{ env('SANCTUM_TOKEN') }}';

    // Make sure to include the CSRF token in your form
    formData.append('_token', document.querySelector('meta[name="csrf-token"]').content);

    // Use Laravel's HTTP client for the request
    axios.put('http://127.0.0.1:8000/api/companies/' + id, formData, {
        headers: {
            'Content-Type': 'multipart/form-data',
            'Authorization': `Bearer ${sanctumToken}`,
        },
    })
    .then(function (response) {
        console.log('Response:', response.data);
        
        clearForm(); // Clear the form
        // Show the success alert
        // redirectToCompanies();
    })
    .catch(function (error) {
        console.error('Error updating company:', error);
        if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.error('Response data:', error.response.data);
            console.error('Response status:', error.response.status);
            console.error('Response headers:', error.response.headers);
        } else if (error.request) {
            // The request was made but no response was received
            console.error('No response received:', error.request);
        } else {
            // Something happened in setting up the request that triggered an Error
            console.error('Error setting up request:', error.message);
        }
        alert('Failed to update company. Please check the console for details.');
    });

    // ... (rest of your JavaScript code)
}

</script>
