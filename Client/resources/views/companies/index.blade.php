@extends('app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<div id="your-alert-container"></div>
                        <!-- Page Header Close -->
                        <!-- Start::row-1 -->
                        <div class="grid grid-cols-12 gap-6">
                            
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box custom-box">
                                    <div class="box-header flex items-center justify-between flex-wrap gap-4">
                                        <div class="box-title">
                                            Companies<span class="badge bg-light text-default rounded-full ms-1 text-[0.75rem] align-middle">{{ $totalItems }}</span>
                                        </div>
                                        <div class="flexflex-wrap gap-2">
                                            <a href="javascript:void(0);" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#createCompanyModal"><i class="ri-add-line font-semibold align-middle"></i>Create Company
                                            </a>
                                            <button type="button" class="ti-btn ti-btn-success !py-1 !px-2 !text-[0.75rem] !m-0">Export As CSV</button>
                                            <div class="hs-dropdown ti-dropdown">
                                                <a href="javascript:void(0);" class="ti-btn ti-btn-light !py-1 !px-2 !text-[0.75rem] !m-0 btn-wave waves-effect waves-light" aria-expanded="false">
                                                    Sort By<i class="ri-arrow-down-s-line align-middle ms-1 inline-block"></i>
                                                </a>
                                                <ul class="hs-dropdown-menu ti-dropdown-menu hidden" role="menu">
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">Newest</a></li>
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">Date Added</a></li>
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">A - Z</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body !p-0">
                                        <div class="table-responsive">
                                            <table class="table whitespace-nowrap min-w-full">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">
                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel" value="" aria-label="...">
                                                        </th>
                                                        <th scope="col" class="text-start">Company Name</th>
                                                        <th scope="col" class="text-start">Email</th>
                                                        <th scope="col" class="text-start">Phone</th>
                                                        <th scope="col" class="text-start">Industry</th>
                                                        <th scope="col" class="text-start">Actions</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($companies as $company)
                                                    <tr class="border border-x-0 border-defaultborder crm-contact" id="tr_{{ $companies['id'] }}">
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                                        </td>
                                                        <td>
                                                            <div class="flex items-center gap-2">
                                                                
                                                                <div>
                                                                    <a href="#" data-hs-overlay="#"style="text-decoration: none"><span class="block font-semibold"style="text-decoration: none">{{ $company['name'] }}</span></a>
                                                                    <span class="block text-[#8c9097] dark:text-white/50 text-[0.6875rem]" title="Last Contacted"><i class="ri-account-circle-line me-1 text-[0.8125rem] align-middle"></i>24, Jul 2023 - 4:45PM</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1"><i class="ri-mail-line me-2 align-middle text-[.875rem] text-[#8c9097] dark:text-white/50 inline-flex"></i>{{ $company['email'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block"><i class="ri-phone-line me-2 align-middle text-[.875rem] text-[#8c9097] dark:text-white/50 inline-flex"></i>{{ $company['phone'] }}</span>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                        {{ $company['industry'] }}
                                                        </td>
                                            
                                                        <td>
                                                            <div class="btn-list">
                                                                
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-info ti-btn-icon"><i class="ri-pencil-line"></i></button>
                                                                
                                                                <a href="{{ url('/companies') }}">
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-danger ti-btn-icon contact-delete" onclick="deleteCompany({{ $company['id'] }})">
                                                                <i class="ri-delete-bin-line"></i>
                                                                </button>
                                                            </a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody> 
                                                
                                            </table>
                                        </div>
                                    </div>
                                     
                                    <div class="box-footer border-t-0">
                                        <div class="flex items-center">
                                            <div>
                                                Showing 10 Entries <i class="bi bi-arrow-right ms-2 font-semibold"></i>
                                            </div>
                                            <div class="ms-auto">
                                                <nav aria-label="Page navigation" class="pagination-style-4">
                                                    
                                                    {{ $companies->links() }}
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End::row-1 -->

                        <!-- Start:: Contact Details Offcanvas -->
                        
                        
    <script type="text/javascript">
    function deleteCompany(id) {
        if (confirm("Are you sure you want to delete this company?")) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/companies/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (result) {
                    // Handle success, e.g., show a message, reload the page
                    console.log('Company deleted successfully:', result);
                    var alertDiv = '<div class="alert alert-primary shadow-sm">Record deleted successfully</div>';
                    $('#your-alert-container').html(alertDiv); // Replace '#your-alert-container' with the actual container where you want to show the alert
                    location.reload(); // Reload the page
                },
                error: function (xhr, status, error) {
                    // Handle error, e.g., show an alert or log the error
                    console.error('Error deleting company:', xhr.responseText);
                }
            });
        }
    }
</script>



                        <!-- End:: Contact Details Offcanvas -->

                        <!-- Start:: Create Contact -->
       <div id="createCompanyModal" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="modal-title text-[1rem] font-semibold text-defaulttextcolor" id="createCompanyLabel">Create Company</h6>
                <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#createCompanyModal">
                    <span class="sr-only">Close</span>
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="ti-modal-body px-4">
                <div class="grid grid-cols-12 gap-4">
                    <div class="xl:col-span-12 col-span-12">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="companyName" placeholder="Enter Company Name">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="companyEmail" class="form-label">Company Email</label>
                        <input type="email" class="form-control" id="companyEmail" placeholder="Enter Email">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="companyIndustry" class="form-label">Company Industry</label>
                        <input type="text" class="form-control" id="companyIndustry" placeholder="Enter Industry">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="companyPhone" class="form-label">Company Phone Number</label>
                        <input type="text" class="form-control" id="companyPhone" placeholder="Enter Phone Number">
                    </div>
                    <!-- Add other fields as needed -->

                </div>
            </div>
            <div class="ti-modal-footer">
                <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-light align-middle" data-hs-overlay="#createCompanyModal">
                    Cancel
                </button>
                <button type="button" class="ti-btn bg-primary text-white !font-medium" onclick="createCompany()">Create Company</button>
            </div>
        </div>
    </div>
</div>

</div>
<script>
    
    function createCompany() {
        // Get form data
        let formData = {
            name: document.getElementById('companyName').value,
            email: document.getElementById('companyEmail').value,
            industry: document.getElementById('companyIndustry').value,
            phone: document.getElementById('companyPhone').value,
            // Add other fields as needed
        };

        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/companies', formData)
            .then(function (response) {
                console.log(response.data);
                showSuccessAlert();
                clearForm();
                // Reload the page after a short delay
                setTimeout(function () {
                    location.reload();
                }, 2000);
            })
            .catch(function (error) {
                console.error('Error creating company:', error);
                alert('Failed to create company. Please check the console for details.');
            });
    }

    function clearForm() {
        // Clear the form fields
        document.getElementById('companyName').value = '';
        document.getElementById('companyEmail').value = '';
        document.getElementById('companyIndustry').value = '';
        document.getElementById('companyPhone').value = '';
        // Clear other fields as needed
    }

    function showSuccessAlert() {
        // Close the modal
        let createCompanyModal = document.getElementById('createCompanyModal');
        if (createCompanyModal) {
            createCompanyModal.classList.remove('hs-overlay-open');
        }

        // Create an alert element
        let alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-primary';
        alertDiv.role = 'alert';
        alertDiv.innerText = 'Company created successfully!';

        // Append the alert to the body
        document.getElementById('your-alert-container').appendChild(alertDiv);

        // Reload the page after a short delay
        setTimeout(function () {
            location.reload();
        }, 2000);
    }


</script>


@endsection