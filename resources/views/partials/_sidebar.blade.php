 
<div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false " to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler">
                                <span></span>
                            </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        
                        <li class="nav-item start ">
                            <a href="javascript:;" class="nav-link nav-toggle">
        
                                <img src="{{ asset('images/' . Auth::user()->images )}}" class="rounded">
                                
                            </a>
                         </li>   
                        <li class="nav-item start ">
                            <a href="{{  url('home') }}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-off" style="color:lime"></i>
                                <span class="title">حسابي</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="/changePassword" class="nav-link ">
                                        <span class="title">تغير كلمة المرور</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                       
                        @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-envelope" style="color:cyan"></i>
                                <span class="title">النتيجة</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{  url('GetStudents') }}" class="nav-link ">
                                        <span class="title">القوائم</span> 
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('result/selectResult') }}" class="nav-link ">
                                        <span class="title">ادخال النتيجة</span> 
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('result/showtResult') }}" class="nav-link ">
                                        <span class="title">عرض النتيجة بالتقدير</span>
                                    </a> 
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('result/showtResultWithGrade') }}" class="nav-link ">
                                        <span class="title">عرض النتيجة بالتقدير و الدرجات</span>
                                    </a> 
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('result/oneSemester') }}" class="nav-link ">

                                        <span class="title">نتيجة فصل دراسي</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{  url('result/details') }}" class="nav-link ">
                                        <span class="title">تفاصيل</span>
                                    </a>
                                </li>
                                 <li class="nav-item  ">
                                    <a href="{{  url('result/GetYearStudentResult') }}" class="nav-link ">
                                        <span class="title">نتيجة طالب لعام</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('result/EditOneSubjectOneStudent') }}" class="nav-link ">
                                        <span class="title">تعديل مادة لطالب واحد</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-envelope" style="color:cyan"></i>
                                <span class="title">الملاحق</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{  url('appendices/appendices') }}" class="nav-link ">
                                        <span class="title">القوائم</span>  
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('appendices/selectAppendicesStudent') }}" class="nav-link ">
                                        <span class="title">ادخال نتيجة</span>  
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('appendices/AppendicesOneStudent') }}" class="nav-link ">
                                        <span class="title">ادخال نتيجة طالب واحد</span>  
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{  url('appendices/SelectAppendicesSubjects') }}" class="nav-link ">
                                        <span class="title">ملاحق طالب واحد</span>  
                                    </a>
                                </li>
                            </ul>

                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-th" style="color:cyan"></i>
                                <span class="">الاقسام</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('depts.index')}}" class="nav-link ">
                                        <span class="title">عرض الاقسام</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item  ">
                                    <a href="{{ route('depts.create')}}" class="nav-link ">
                                        <span class="title">انشاء قسم جديد</span>
                                    </a>
                                </li>  
                            </ul>
                        </li>

                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="glyphicon glyphicon-th" style="color:cyan"></i>
                                <span class="">المواد</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('subjects.index')}}" class="nav-link ">
                                        <span class="title">عرض المواد</span>
                                    </a>
                                </li>
                                 
                                <li class="nav-item  ">
                                    <a href="{{ route('subjects.create')}}" class="nav-link ">
                                        <span class="title">انشاء مادة جديدة</span>
                                    </a>
                                </li>    
                                <li class="nav-item  ">
                                    <a href="{{  url('selectDept') }}" class="nav-link ">
                                        <span class="title">عرض المواد بالاقسام</span> 
                                    </a>
                                </li>              
                            </ul>
                        </li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user" style="color:cyan"></i>
                                <span class="title">الطلاب</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ route('users.index')}}" class="nav-link ">
                                        <span class="title">عرض الطلاب</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ route('users.create')}}" class="nav-link ">
                                        <span class="title">اضافة طالب</span>
                                    </a>
                                </li>
                                <li class="nav-item  ">
                                    <a href="{{ url('SelectStudent') }}" class="nav-link ">
                                        <span class="title">تعديل بيانات طالب</span>
                                    </a>
                                </li>     
                            </ul>
                        </li>
                        @endcan
                        @can('isAdmin')
                        <li class="nav-item  ">
                            <a href="javascript:;" class="nav-link nav-toggle">
                                <i class="icon-user" style="color:cyan"></i>
                                <span class="title">الترحيل</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item  ">
                                    <a href="{{ url('prepartransform') }}" class="nav-link ">
                                        <span class="title">ترحيل الطلاب</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        <li class="nav-item  "> 
                            <a href="" class="nav-link ">
                                        <i class="icon-call-end" style="color:cyan"></i>
                                        <span class="title">الدعم الفنى 249911405218</span>
                                    </a>
                        </li>
                        
                        <li class="nav-item  ">
                            <a href="{{ route('user.logout') }}" class="nav-link ">
                                        <i class="glyphicon glyphicon-off" style="color:red"></i>
                                        <span class="title">خروج</span>
                            </a>
                            
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>