@extends('app')
@section('content')

<div class="grid grid-cols-12 gap-6">
                            
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box custom-box">
                                    <div class="box-header flex items-center justify-between flex-wrap gap-4">
                                        <div class="box-title">
                                            Deals<span class="badge bg-light text-default rounded-full ms-1 text-[0.75rem] align-middle">{{ $totalItems }}</span>
                                        </div>
                                        <div class="flexflex-wrap gap-2">
                                            <a href="{{ url('/deals/create') }}" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#createCompanyModal"><i class="ri-add-line font-semibold align-middle"></i>Create Contact
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
                                                        <th scope="col" class="text-start">Description</th>
                                                        <th scope="col" class="text-start">Amount</th>
                                                        <th scope="col" class="text-start">Company Name</th>
                                                        <th scope="col" class="text-start">Company Email</th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>
                                                    @foreach ($paginator as $deal)
                                                    <tr class="border border-x-0 border-defaultborder crm-contact">
                                                        <td>
                                                            <input class="form-check-input" type="checkbox" id="checkboxNoLabel1" value="" aria-label="...">
                                                        </td>
                                                        <td>
                                                            <div class="flex items-center gap-2">
                                                                
                                                                <div>
                                                                    <a href="#" data-hs-overlay="#"style="text-decoration: none"><span class="block font-semibold"style="text-decoration: none">{{ $deal['name'] }}</span></a>
                                                                    <span class="block text-[#8c9097] text-[0.6875rem]" title="Last Contacted"><i class="ri-account-circle-line me-1 text-[0.8125rem] align-middle"></i>24, Jul 2023 - 4:45PM</span>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1">{{ $deal['description'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block mb-1"><i class="ri-mail-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $deal['amount'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block"><i class="ri-phone-line me-2 align-middle text-[.875rem] text-[#8c9097] inline-flex"></i>{{ $deal['company']['name'] }}</span>
                                                            </div>
                                                        </td>
                                                    
                                                        <td>
                                                        <div>
                                                                <span class="block">{{ $deal['company']['email'] }}</span>
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
                                                                                <p>Hey there! Deleting this deal is irreversible. Confirm if you're feeling brave!</p>
                                                                            </div>
                                                                            <div class="ti-modal-footer">
                                                                                <button type="button"
                                                                                class="hs-dropdown-toggle ti-btn  ti-btn-secondary-full align-middle"
                                                                                data-hs-overlay="#staticBackdrop
                                                                                ">
                                                                                Close
                                                                                </button>
                                                                                <button type="button" class="ti-btn bg-danger text-white !font-medium" onclick="deleteDeal({{ $deal['id'] }})">Understood</button>
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
    function deleteDeal(id) {
       {
            let sanctumToken = '{{ env('SANCTUM_TOKEN') }}';

            $.ajax({
                url: 'http://127.0.0.1:8000/api/deals/' + id,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Authorization': 'Bearer ' + sanctumToken
                },
                success: function (result) {
                    // Handle success, e.g., show a message, reload the page
                    console.log('Deal deleted successfully:', result);
                    var alertDiv = '<div class="alert alert-primary shadow-sm">Record deleted successfully</div>';
                    $('#your-alert-container').html(alertDiv); // Replace '#your-alert-container' with the actual container where you want to show the alert
                    location.reload(); // Reload the page
                },
                error: function (xhr, status, error) {
                    // Handle error, e.g., show an alert or log the error
                    console.error('Error deleting deal:', xhr.responseText);
                }
            });
        }
    }
</script>                   

@endsection