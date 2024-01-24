@extends('app')
@section('content')
<div id="your-alert-container"></div>
<div class="grid grid-cols-12 gap-6">
                            
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box custom-box">
                                    <div class="box-header flex items-center justify-between flex-wrap gap-4">
                                        <div class="box-title">
                                            Contacts<span class="badge bg-light text-default rounded-full ms-1 text-[0.75rem] align-middle">{{ $totalItems }}</span>
                                        </div>
                                        <div class="flexflex-wrap gap-2">
                                            <a href="javascript:void(0);" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#createContactModal"><i class="ri-add-line font-semibold align-middle"></i>Create Contact
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
                                                        <th scope="col" class="text-start">Name</th>
                                                        <th scope="col" class="text-start">Job Title</th>
                                                        <th scope="col" class="text-start">Email</th>
                                                        <th scope="col" class="text-start">Phone</th>
                                                        <th scope="col" class="text-start">Company Affiliated</th>
                                                        <th scope="col" class="text-start">Industry</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($paginator as $contact)
                                                    <tr class="border border-x-0 border-defaultborder crm-contact">
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                                        </td>
                                                        <td>
                                                            <div class="flex items-center gap-2">
                                                                
                                                                <div>
                                                                    <a href="#" data-hs-overlay="#"style="text-decoration: none"><span class="block font-semibold"style="text-decoration: none">{{ $contact['name'] }}</span></a>
                                                                    {{-- <span class="block text-[#8c9097] text-[0.6875rem]" title="Last Contacted"><i class="ri-account-circle-line me-1 text-[0.8125rem] align-middle"></i>{{ $contact['created_at'] }}</span> --}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1">{{ $contact['job_title'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1"><i class="ri-mail-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $contact['email'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block"><i class="ri-phone-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $contact['phone'] }}</span>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                        <div>
                                                                <span class="block">{{ $contact['company']['name'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                        <div>
                                                                <span class="block">{{ $contact['company']['industry'] }}</span>
                                                            </div>
                                                        </td>
                                            
                                                        <td>
                                                            <div class="btn-list">
                                                                
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-info ti-btn-icon"><i class="ri-pencil-line"></i></button>
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-danger ti-btn-icon contact-delete" onclick="deleteContact({{ $contact['id'] }})">
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
                                                    
                                                    {{ $paginator->links() }}
                                                </nav>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


    <script type="text/javascript">
    function deleteContact(id) {
        if (confirm("Are you sure you want to delete this contact?")) {
            $.ajax({
                url: 'http://127.0.0.1:8000/api/contacts/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function (result) {
                    console.log('Contact deleted successfully:', result);
                    var alertDiv = '<div class="alert alert-primary shadow-sm">Record deleted successfully</div>';
                    $('#your-alert-container').html(alertDiv);
                    location.reload();
                },
                error: function (xhr, status, error) {
                    console.error('Error deleting contact:', xhr.responseText);
                }
            });
        }
    }
</script>    


<div id="createContactModal" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="modal-title text-[1rem] font-semibold text-defaulttextcolor" id="createContactLabel">Create Contact</h6>
                <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#createContactModal">
                    <span class="sr-only">Close</span>
                    <i class="ri-close-line"></i>
                </button>
            </div>
            <div class="ti-modal-body px-4">
                <div class="grid grid-cols-12 gap-4">
                    <div class="xl:col-span-12 col-span-12">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="Enter First Name">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Enter Last Name">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="jobTitle" class="form-label">Job Title</label>
                        <input type="text" class="form-control" id="jobTitle" placeholder="Enter Job Title">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" placeholder="Enter Phone Number">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="companyId" class="form-label">Company</label>
                        <select class="form-control" id="companyId" name="company_id" required>
                            @foreach ($companies as $company)
                                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Add other fields as needed -->

                </div>
            </div>
            <div class="ti-modal-footer">
                <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-light align-middle" data-hs-overlay="#createContactModal">
                    Cancel
                </button>
                <button type="button" class="ti-btn bg-primary text-white !font-medium" onclick="createContact()">Create Contact</button>
            </div>
        </div>
    </div>
</div>

<script>
    function createContact() {
        // Get form data
        let formData = {
            first_name: document.getElementById('firstName').value,
            last_name: document.getElementById('lastName').value,
            job_title: document.getElementById('jobTitle').value,
            email: document.getElementById('email').value,
            phone: document.getElementById('phone').value,
            company_id: document.getElementById('companyId').value,
        };
        let sanctumToken = '{{ env('SANCTUM_TOKEN') }}';
        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/contacts', formData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${sanctumToken}`,
            },
        })
            .then(function (response) {
                console.log(response.data);
                showSuccessAlert();
                redirectToContacts();
            })
            .catch(function (error) {
                console.error('Error creating contact:', error);
                alert('Failed to create contact. Please check the console for details.');
            })
            .finally(function () {
                clearForm();
            });
    }

    function clearForm() {
        // Clear the form fields
        document.getElementById('firstName').value = '';
        document.getElementById('lastName').value = '';
        document.getElementById('jobTitle').value = '';
        document.getElementById('email').value = '';
        document.getElementById('phone').value = '';
        document.getElementById('companyId').value = '';
        // Clear other fields as needed
    }

    function redirectToContacts() {
        // Redirect to the "/contacts" page
        window.location.href = '/contacts';
    }

    function showSuccessAlert() {
        // Display the success alert
        let alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-primary';
        alertDiv.role = 'alert';
        alertDiv.innerText = 'Contact created successfully!';

        // Append the alert to the document
        document.getElementById('your-alert-container').appendChild(alertDiv);
    }
</script>


@endsection