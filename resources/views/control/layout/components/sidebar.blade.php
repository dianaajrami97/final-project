<div class="page-sidebar-wrapper">                    
                    <div class="page-sidebar navbar-collapse collapse">                       
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">                            
                            <li class="sidebar-toggler-wrapper hide">
                                <div class="sidebar-toggler">
                                    <span></span>
                                </div>
                            </li>
                          



                            <li class="nav-item start active open">
                                <a href="{{ route('dashboard') }}" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                    <span class="selected"></span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Quick Links</h3>
                            </li>

                            {{-- Categreis Links --}}
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Categoreis</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ route('category.all') }}" class="nav-link ">
                                            <span class="title"><i class="fa fa-list"></i> All Categories</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ route('category.create') }}" class="nav-link ">
                                            <span class="title"><i class="fa fa-plus"></i> Add Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            {{-- Books Links --}}
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="fa fa-book"></i>
                                    <span class="title">Books</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="{{ route('book.all') }}" class="nav-link ">
                                            <span class="title"><i class="fa fa-list"></i> All Books</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="{{ route('book.create') }}" class="nav-link ">
                                            <span class="title"><i class="fa fa-plus"></i> Add Book</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- END SIDEBAR -->
                </div>