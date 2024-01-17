@extends('app')
@section('content')

<div class="grid grid-cols-12 gap-6">
                            
                            <div class="xl:col-span-12 col-span-12">
                                <div class="box custom-box">
                                    <div class="box-header flex items-center justify-between flex-wrap gap-4">
                                        <div class="box-title">
                                            Contacts<span class="badge bg-light text-default rounded-full ms-1 text-[0.75rem] align-middle">{{ $totalItems }}</span>
                                        </div>
                                        <div class="flexflex-wrap gap-2">
                                            <a href="{{ url('/contacts/create') }}" class="hs-dropdown-toggle ti-btn ti-btn-primary-full !py-1 !px-2 !text-[0.75rem]" data-hs-overlay="#createCompanyModal"><i class="ri-add-line font-semibold align-middle"></i>Create Contact
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
                                                                    <span class="block text-[#8c9097] dark:text-white/50 text-[0.6875rem]" title="Last Contacted"><i class="ri-account-circle-line me-1 text-[0.8125rem] align-middle"></i>24, Jul 2023 - 4:45PM</span>
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
                                                                <span class="block mb-1"><i class="ri-mail-line me-2 align-middle text-[.875rem] text-[#8c9097] dark:text-white/50 inline-flex"></i>{{ $contact['email'] }}</span>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div>
                                                                <span class="block"><i class="ri-phone-line me-2 align-middle text-[.875rem] text-[#8c9097] dark:text-white/50 inline-flex"></i>{{ $contact['phone'] }}</span>
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
                                                                
                                                                <a href="{{ url('/companies') }}">
                                                                <button aria-label="button" type="button" class="ti-btn ti-btn-sm ti-btn-danger ti-btn-icon contact-delete" >
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

@endsection