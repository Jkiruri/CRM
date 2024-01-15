@extends('app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
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
                                            <a href="javascript:void(0);" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#todo-compose"><i class="ri-add-line font-semibold align-middle"></i>Create Contact
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
                        <div id="todo-compose" class="hs-overlay hidden ti-modal">
                            <div class="hs-overlay-open:mt-7 ti-modal-box mt-0 ease-out">
                            <div class="ti-modal-content">
                                <div class="ti-modal-header">
                                    <h6 class="modal-title text-[1rem] font-semibold text-defaulttextcolor" id="mail-ComposeLabel">Create Contact</h6>
                                    <button type="button" class="hs-dropdown-toggle !text-[1rem] !font-semibold !text-defaulttextcolor" data-hs-overlay="#todo-compose">
                                        <span class="sr-only">Close</span>
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                                <div class="ti-modal-body px-4">
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="xl:col-span-12 col-span-12">
                                            <div class="mb-0 text-center">
                                                <span class="avatar avatar-xxl avatar-rounded">
                                                    <img src="build/assets/images/faces/9.jpg" alt="" id="profile-img">
                                                    <span class="badge rounded-pill bg-primary avatar-badge">
                                                        <input type="file" name="photo" class="absolute w-full h-full opacity-0" id="profile-change">
                                                        <i class="fe fe-camera text-[.625rem]"></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-6 col-span-12">
                                            <label for="deal-title" class="form-label">Deal Title</label>
                                            <input type="text" class="form-control" id="deal-title" placeholder="Deal Title">
                                        </div>
                                        <div class="xl:col-span-6 col-span-12">
                                            <label for="contact-lead-score" class="form-label">Lead Score</label>
                                            <input type="number" class="form-control" id="contact-lead-score" placeholder="Lead Score">
                                        </div>
                                        <div class="xl:col-span-12 col-span-12">
                                            <label for="contact-mail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="contact-mail" placeholder="Enter Email">
                                        </div>
                                        <div class="xl:col-span-12 col-span-12">
                                            <label for="contact-phone" class="form-label">Phone No</label>
                                            <input type="tel" class="form-control" id="contact-phone" placeholder="Enter Phone Number">
                                        </div>
                                        <div class="xl:col-span-12 col-span-12">
                                            <label for="company-name" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="company-name" placeholder="Company Name">
                                        </div>
                                        <div class="xl:col-span-12 col-span-12">
                                            <label class="form-label">Lead Source</label>
                                            <select class="form-control" name="choices-multiple-remove-button1" id="choices-multiple-remove-button1">
                                                <option value="Choice 1">Social Media</option>
                                                <option value="Choice 2">Direct mail</option>
                                                <option value="Choice 3">Blog Articles</option>
                                                <option value="Choice 4">Affiliates</option>
                                                <option value="Choice 5">Organic search</option>
                                            </select>
                                        </div>
                                        <div class="xl:col-span-6 col-span-12">
                                            <label class="form-label">Last Contacted</label>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-text text-[#8c9097] dark:text-white/50"> <i class="ri-calendar-line"></i> </div>
                                                    <input type="text" class="form-control" id="targetDate" placeholder="Choose date and time">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="xl:col-span-6 col-span-12">
                                            <label class="form-label">Tags</label>
                                            <select class="form-control" name="choices-multiple-remove-button2" id="choices-multiple-remove-button2" multiple>
                                                <option value="">Select Tag</option>
                                                <option value="Choice 1">New Lead</option>
                                                <option value="Choice 2">Prospect</option>
                                                <option value="Choice 3">Customer</option>
                                                <option value="Choice 4">Hot Lead</option>
                                                <option value="Choice 5">Partner</option>
                                                <option value="Choice 6">LostCustomer</option>
                                                <option value="Choice 7">Influencer</option>
                                                <option value="Choice 8">Subscriber</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="ti-modal-footer">
                                    <button type="button"
                                    class="hs-dropdown-toggle ti-btn  ti-btn-light align-middle"
                                    data-hs-overlay="#todo-compose">
                                    Cancel
                                </button>
                                    <button type="button" class="ti-btn bg-primary text-white !font-medium">Create Contact</button>
                                </div>
                            </div>
                            </div>
                        </div>
@endsection