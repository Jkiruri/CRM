@extends('app')
@section('content')
<div id="your-alert-container"></div>
<div class="grid grid-cols-12 gap-6">
                            
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box custom-box">
                                    <div class="box-header flex items-center justify-between flex-wrap gap-4">
                                        <div class="box-title">
                                            Leads<span class="badge bg-light text-default rounded-full ms-1 text-[0.75rem] align-middle">{{ $totalItems }}</span>
                                        </div>
                                        <div class="flexflex-wrap gap-2">
                                            <a href="javascript:void(0);" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#createLeadModal"><i class="ri-add-line font-semibold align-middle"></i>Create Lead
                                            </a>
                                            {{-- <button type="button" class="ti-btn ti-btn-success !py-1 !px-2 !text-[0.75rem] !m-0">Export As CSV</button>
                                            <div class="hs-dropdown ti-dropdown">
                                                <a href="javascript:void(0);" class="ti-btn ti-btn-light !py-1 !px-2 !text-[0.75rem] !m-0 btn-wave waves-effect waves-light" aria-expanded="false">
                                                    Sort By<i class="ri-arrow-down-s-line align-middle ms-1 inline-block"></i>
                                                </a>
                                                <ul class="hs-dropdown-menu ti-dropdown-menu hidden" role="menu">
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">Newest</a></li>
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">Date Added</a></li>
                                                    <li><a class="ti-dropdown-item" href="javascript:void(0);">A - Z</a></li>
                                                </ul>
                                            </div> --}}
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
                                                        <th scope="col" class="text-start">Email</th>
                                                        <th scope="col" class="text-start">Status</th>
                                                        <th scope="col" class="text-start">Company Affiliated</th>
                                                        <th scope="col" class="text-start">Industry</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($paginator as $lead)
                                                    <tr class="border border-x-0 border-defaultborder crm-contact">
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                                        </td>
                                                        <td>
                                                            <div class="flex items-center gap-2">
                                                                
                                                                <div>
                                                                    <a href="#" data-hs-overlay="#"style="text-decoration: none"><span class="block font-semibold"style="text-decoration: none">{{ $lead['name'] }}</span></a>
                                                                    <span class="block text-[#8c9097] text-[0.6875rem]" title="Last Contacted"><i class="ri-account-circle-line me-1 text-[0.8125rem] align-middle"></i>24, Jul 2023 - 4:45PM</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1">{{ $lead['email'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1"><i class="ri-mail-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $lead['status'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block"><i class="ri-phone-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $lead['company']['name'] }}</span>
                                                            </div>
                                                        </td>
                                                    
                                                        <td>
                                                        <div>
                                                                <span class="block">{{ $lead['company']['industry'] }}</span>
                                                            </div>
                                                        </td>
                                            
                                                        <td>
                                                            <div class="btn-list">
                                                                
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-info ti-btn-icon"><i class="ri-pencil-line"></i></button>
                                                               

                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-danger ti-btn-icon contact-delete" data-hs-overlay="#staticBackdrop">
                                                                <i class="ri-delete-bin-line"></i>
                                                                </button>

 
                                                                <div id="staticBackdrop" class="hs-overlay hidden ti-modal  [--overlay-backdrop:static]">
                                                                        <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                                                                            <div class="ti-modal-content">
                                                                            <div class="ti-modal-header">
                                                                                <h6 class="modal-title text-[1rem] font-semibold">The Vanishing Act.</h6>
                                                                                    <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#staticBackdrop">
                                                                                    <span class="sr-only">Close</span>
                                                                                    <i class="ri-close-line"></i>
                                                                                    </button>
                                                                            </div>
                                                                            <div class="ti-modal-body px-4">
                                                                                <p>Hey there! Deleting this lead is irreversible. Confirm if you're feeling brave!</p>
                                                                            </div>
                                                                            <div class="ti-modal-footer">
                                                                                <button type="button"
                                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                                data-hs-overlay="#staticBackdrop
                                                                                ">
                                                                                Close
                                                                                </button>
                                                                                <button type="button" class="ti-btn bg-danger text-white !font-medium" onclick="deleteLead({{ $lead['id'] }})">Understood</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </div>


                                                            
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
    function deleteLead(id) {
        {
            let sanctumToken = '{{ env('SANCTUM_TOKEN') }}';

            $.ajax({
                url: 'http://127.0.0.1:8000/api/leads/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Authorization': 'Bearer ' + sanctumToken
                },
                success: function (result) {
                    // Handle success, e.g., show a message, reload the page
                    console.log('Lead deleted successfully:', result);
                    var alertDiv = '<div class="alert alert-primary shadow-sm">Record deleted successfully</div>';
                    $('#your-alert-container').html(alertDiv); // Replace '#your-alert-container' with the actual container where you want to show the alert
                    location.reload(); // Reload the page
                },
                error: function (xhr, status, error) {
                    // Handle error, e.g., show an alert or log the error
                    console.error('Error deleting contact:', xhr.responseText);
                }
            });
        }
    }
</script>     


<div id="createLeadModal" class="hs-overlay hidden ti-modal">
    <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
        <div class="ti-modal-content">
            <div class="ti-modal-header">
                <h6 class="modal-title text-[1rem] font-semibold text-defaulttextcolor" id="createLeadLabel">Create Lead</h6>
                <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#createLeadModal">
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
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">
                    </div>
                    <div class="xl:col-span-12 col-span-12">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="pending">Pending</option>
                            <option value="inprogress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
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
                <button type="button" class="hs-dropdown-toggle ti-btn ti-btn-light align-middle" data-hs-overlay="#createLeadModal">
                    Cancel
                </button>
                <button type="button" class="ti-btn bg-primary text-white !font-medium" onclick="createLead()">Create Lead</button>
            </div>
        </div>
    </div>
</div>

<script>
    function createLead() {
        // Get form data
        let formData = {
            first_name: document.getElementById('firstName').value,
            last_name: document.getElementById('lastName').value,
            email: document.getElementById('email').value,
            status: document.getElementById('status').value,
            company_id: document.getElementById('companyId').value,
        };

        let sanctumToken = '{{ env('SANCTUM_TOKEN') }}';

        // Make a POST request using Axios
        axios.post('http://127.0.0.1:8000/api/leads', formData, {
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${sanctumToken}`,
            },
        })
        .then(function (response) {
            console.log(response.data);
            showSuccessAlert();
            redirectToLeads();
        })
        .catch(function (error) {
            console.error('Error creating lead:', error);
            alert('Failed to create lead. Please check the console for details.');
        })
        .finally(function () {
            clearForm();
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

    function redirectToLeads() {
        // Redirect to the "/leads" page
        window.location.href = '/leads';
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
        // Display the success alert
        let alertDiv = document.createElement('div');
        alertDiv.className = 'alert alert-primary';
        alertDiv.role = 'alert';
        alertDiv.innerText = 'Lead created successfully!';

        // Append the alert to the document
        document.getElementById('your-alert-container').appendChild(alertDiv);
    }
</script>



@endsection