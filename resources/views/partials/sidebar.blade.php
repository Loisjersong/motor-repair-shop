<aside
    :class="sidebarToggle ? 'translate-x-0' : '-translate-x-full'"
    class="absolute left-0 top-0 z-9999 flex h-screen w-72.5 flex-col overflow-y-hidden bg-black duration-300 ease-linear dark:bg-boxdark lg:static lg:translate-x-0"
    @click.outside="sidebarToggle = false"
>
    <!-- SIDEBAR HEADER -->
    <div class="flex items-center justify-between gap-2 px-6 py-5.5 lg:py-6.5">
        <a href="/">
            <h1 class="rounded-sm px-4 py-2 font-medium text-xl text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4">4M Motorshop</h1>
        </a>

        <button
            class="block lg:hidden"
            @click.stop="sidebarToggle = !sidebarToggle"
        >
            <svg
                class="fill-current"
                width="20"
                height="18"
                viewBox="0 0 20 18"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M19 8.175H2.98748L9.36248 1.6875C9.69998 1.35 9.69998 0.825 9.36248 0.4875C9.02498 0.15 8.49998 0.15 8.16248 0.4875L0.399976 8.3625C0.0624756 8.7 0.0624756 9.225 0.399976 9.5625L8.16248 17.4375C8.31248 17.5875 8.53748 17.7 8.76248 17.7C8.98748 17.7 9.17498 17.625 9.36248 17.475C9.69998 17.1375 9.69998 16.6125 9.36248 16.275L3.02498 9.8625H19C19.45 9.8625 19.825 9.4875 19.825 9.0375C19.825 8.55 19.45 8.175 19 8.175Z"
                    fill=""
                />
            </svg>
        </button>
    </div>
    <!-- SIDEBAR HEADER -->

    <div
        class="no-scrollbar flex flex-col overflow-y-auto duration-300 ease-linear"
    >
        <!-- Sidebar Menu -->
        <nav
            class="mt-5 px-4 py-4 lg:mt-9 lg:px-6"
            x-data="{ selected: $persist('dashboard') }"
        >
            <div>
                <ul class="mb-6 flex flex-col gap-1.5">
                    <!-- begin::Dashboard -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="/dashboard"
                            @click="selected = 'dashboard'"
                            :class="{
                                'bg-graydark dark:bg-meta-4': selected === 'dashboard'
                            }"
                        >
                            <svg
                                class="fill-current"
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M6.10322 0.956299H2.53135C1.5751 0.956299 0.787598 1.7438 0.787598 2.70005V6.27192C0.787598 7.22817 1.5751 8.01567 2.53135 8.01567H6.10322C7.05947 8.01567 7.84697 7.22817 7.84697 6.27192V2.72817C7.8751 1.7438 7.0876 0.956299 6.10322 0.956299ZM6.60947 6.30005C6.60947 6.5813 6.38447 6.8063 6.10322 6.8063H2.53135C2.2501 6.8063 2.0251 6.5813 2.0251 6.30005V2.72817C2.0251 2.44692 2.2501 2.22192 2.53135 2.22192H6.10322C6.38447 2.22192 6.60947 2.44692 6.60947 2.72817V6.30005Z"
                                    fill=""
                                />
                                <path
                                    d="M15.4689 0.956299H11.8971C10.9408 0.956299 10.1533 1.7438 10.1533 2.70005V6.27192C10.1533 7.22817 10.9408 8.01567 11.8971 8.01567H15.4689C16.4252 8.01567 17.2127 7.22817 17.2127 6.27192V2.72817C17.2127 1.7438 16.4252 0.956299 15.4689 0.956299ZM15.9752 6.30005C15.9752 6.5813 15.7502 6.8063 15.4689 6.8063H11.8971C11.6158 6.8063 11.3908 6.5813 11.3908 6.30005V2.72817C11.3908 2.44692 11.6158 2.22192 11.8971 2.22192H15.4689C15.7502 2.22192 15.9752 2.44692 15.9752 2.72817V6.30005Z"
                                    fill=""
                                />
                                <path
                                    d="M6.10322 9.92822H2.53135C1.5751 9.92822 0.787598 10.7157 0.787598 11.672V15.2438C0.787598 16.2001 1.5751 16.9876 2.53135 16.9876H6.10322C7.05947 16.9876 7.84697 16.2001 7.84697 15.2438V11.7001C7.8751 10.7157 7.0876 9.92822 6.10322 9.92822ZM6.60947 15.272C6.60947 15.5532 6.38447 15.7782 6.10322 15.7782H2.53135C2.2501 15.7782 2.0251 15.5532 2.0251 15.272V11.7001C2.0251 11.4188 2.2501 11.1938 2.53135 11.1938H6.10322C6.38447 11.1938 6.60947 11.4188 6.60947 11.7001V15.272Z"
                                    fill=""
                                />
                                <path
                                    d="M15.4689 9.92822H11.8971C10.9408 9.92822 10.1533 10.7157 10.1533 11.672V15.2438C10.1533 16.2001 10.9408 16.9876 11.8971 16.9876H15.4689C16.4252 16.9876 17.2127 16.2001 17.2127 15.2438V11.7001C17.2127 10.7157 16.4252 9.92822 15.4689 9.92822ZM15.9752 15.272C15.9752 15.5532 15.7502 15.7782 15.4689 15.7782H11.8971C11.6158 15.7782 11.3908 15.5532 11.3908 15.272V11.7001C11.3908 11.4188 11.6158 11.1938 11.8971 11.1938H15.4689C15.7502 11.1938 15.9752 11.4188 15.9752 11.7001V15.272Z"
                                    fill=""
                                />
                            </svg>

                            Dashboard
                        </a>
                    </li>
                    <!-- end::Dashboard -->

                    <!-- begin::Appointments -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="#"
                            @click="selected = (selected === 'Appointments' ? '':'Appointments')"
                            :class="{'bg-graydark dark:bg-meta-4': selected === 'Appointments'}"
                        >
                            <svg
                                class="fill-current"
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M15.7499 2.9812H14.2874V2.36245C14.2874 2.02495 14.0062 1.71558 13.6405 1.71558C13.2749 1.71558 12.9937 1.99683 12.9937 2.36245V2.9812H4.97803V2.36245C4.97803 2.02495 4.69678 1.71558 4.33115 1.71558C3.96553 1.71558 3.68428 1.99683 3.68428 2.36245V2.9812H2.2499C1.29365 2.9812 0.478027 3.7687 0.478027 4.75308V14.5406C0.478027 15.4968 1.26553 16.3125 2.2499 16.3125H15.7499C16.7062 16.3125 17.5218 15.525 17.5218 14.5406V4.72495C17.5218 3.7687 16.7062 2.9812 15.7499 2.9812ZM1.77178 8.21245H4.1624V10.9968H1.77178V8.21245ZM5.42803 8.21245H8.38115V10.9968H5.42803V8.21245ZM8.38115 12.2625V15.0187H5.42803V12.2625H8.38115ZM9.64678 12.2625H12.5999V15.0187H9.64678V12.2625ZM9.64678 10.9968V8.21245H12.5999V10.9968H9.64678ZM13.8374 8.21245H16.228V10.9968H13.8374V8.21245ZM2.2499 4.24683H3.7124V4.83745C3.7124 5.17495 3.99365 5.48433 4.35928 5.48433C4.7249 5.48433 5.00615 5.20308 5.00615 4.83745V4.24683H13.0499V4.83745C13.0499 5.17495 13.3312 5.48433 13.6968 5.48433C14.0624 5.48433 14.3437 5.20308 14.3437 4.83745V4.24683H15.7499C16.0312 4.24683 16.2562 4.47183 16.2562 4.75308V6.94683H1.77178V4.75308C1.77178 4.47183 1.96865 4.24683 2.2499 4.24683ZM1.77178 14.5125V12.2343H4.1624V14.9906H2.2499C1.96865 15.0187 1.77178 14.7937 1.77178 14.5125ZM15.7499 15.0187H13.8374V12.2625H16.228V14.5406C16.2562 14.7937 16.0312 15.0187 15.7499 15.0187Z"
                                    fill=""
                                />
                            </svg>

                            Appointments

                            <svg
                                class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'Appointments') }"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill=""
                                />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div
                            class="translate transform overflow-hidden"
                            :class="(selected === 'Appointments') ? 'block' : 'hidden'"
                        >
                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="{{
                                            route('appointments.step-one')
                                        }}"
                                        :class="page === 'formLayout' && '!text-white'"
                                    >
                                        Create Appointment</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="/appointments/index"
                                        :class="page === 'formElements' && '!text-white'"
                                    >
                                        Manage Appointments</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- end::Appointments -->

                    <!-- begin::User Management -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="#"
                            @click="selected = (selected === 'User' ? '':'User')"
                            :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Profile') && (page === 'profile') }"
                            :class="page === 'profile' && 'bg-graydark'"
                        >
                            <svg
                                class="fill-current"
                                width="18"
                                height="18"
                                viewBox="0 0 18 18"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M9.0002 7.79065C11.0814 7.79065 12.7689 6.1594 12.7689 4.1344C12.7689 2.1094 11.0814 0.478149 9.0002 0.478149C6.91895 0.478149 5.23145 2.1094 5.23145 4.1344C5.23145 6.1594 6.91895 7.79065 9.0002 7.79065ZM9.0002 1.7719C10.3783 1.7719 11.5033 2.84065 11.5033 4.16252C11.5033 5.4844 10.3783 6.55315 9.0002 6.55315C7.62207 6.55315 6.49707 5.4844 6.49707 4.16252C6.49707 2.84065 7.62207 1.7719 9.0002 1.7719Z"
                                    fill=""
                                />
                                <path
                                    d="M10.8283 9.05627H7.17207C4.16269 9.05627 1.71582 11.5313 1.71582 14.5406V16.875C1.71582 17.2125 1.99707 17.5219 2.3627 17.5219C2.72832 17.5219 3.00957 17.2407 3.00957 16.875V14.5406C3.00957 12.2344 4.89394 10.3219 7.22832 10.3219H10.8564C13.1627 10.3219 15.0752 12.2063 15.0752 14.5406V16.875C15.0752 17.2125 15.3564 17.5219 15.7221 17.5219C16.0877 17.5219 16.3689 17.2407 16.3689 16.875V14.5406C16.2846 11.5313 13.8377 9.05627 10.8283 9.05627Z"
                                    fill=""
                                />
                            </svg>

                            User Management

                            <svg
                                class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'User') }"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill=""
                                />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div
                            class="translate transform overflow-hidden"
                            :class="(selected === 'User') ? 'block' : 'hidden'"
                        >
                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="{{route ('users.create')}}"
                                        :class="page === 'formLayout' && '!text-white'"
                                    >
                                        Add Users</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="{{ route('users.index') }}"
                                        :class="page === 'formElements' && '!text-white'"
                                    >
                                        Manage Users</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- end::User Management -->

                    <!-- Menu Item Forms -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm px-4 py-2 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="{{ route('categories.index') }}"
                            @click="selected = 'Categories'"
                            :class="{
                                'bg-graydark dark:bg-meta-4': selected === 'Categories'
                            }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z"
                                />
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M6 6h.008v.008H6V6Z"
                                />
                            </svg>

                            Categories
                        </a>
                    </li>
                    <!-- Menu Item Forms -->

                    <!-- Menu Item Tables -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="#"
                            @click="selected = (selected === 'Products' ? '' : 'Products')"
                            :class="{ 'bg-graydark dark:bg-meta-4': selected === 'Products' }"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"
                                />
                            </svg>

                            Products

                            <svg
                                class="absolute right-4 top-1/2 -translate-y-1/2 fill-current"
                                :class="{ 'rotate-180': (selected === 'Products') }"
                                width="20"
                                height="20"
                                viewBox="0 0 20 20"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M4.41107 6.9107C4.73651 6.58527 5.26414 6.58527 5.58958 6.9107L10.0003 11.3214L14.4111 6.91071C14.7365 6.58527 15.2641 6.58527 15.5896 6.91071C15.915 7.23614 15.915 7.76378 15.5896 8.08922L10.5896 13.0892C10.2641 13.4147 9.73651 13.4147 9.41107 13.0892L4.41107 8.08922C4.08563 7.76378 4.08563 7.23614 4.41107 6.9107Z"
                                    fill=""
                                />
                            </svg>
                        </a>

                        <!-- Dropdown Menu Start -->
                        <div
                            class="translate transform overflow-hidden"
                            :class="(selected === 'Products') ? 'block' : 'hidden'"
                        >
                            <ul class="mb-5.5 mt-4 flex flex-col gap-2.5 pl-6">
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="{{ route('products.create') }}"
                                        :class="page === 'Add Products' ? '!text-white' : ''"
                                        >Add Products</a
                                    >
                                </li>
                                <li>
                                    <a
                                        class="group relative flex items-center gap-2.5 rounded-md px-4 font-medium text-bodydark2 duration-300 ease-in-out hover:text-white"
                                        href="{{ route('products.index') }}"
                                        :class="page === 'Manage Products' ? '!text-white' : ''"
                                        >Manage Products</a
                                    >
                                </li>
                            </ul>
                        </div>
                        <!-- Dropdown Menu End -->
                    </li>

                    <!-- Menu Item Tables -->

                    <!-- begin::Product Log -->
                    <li>
                        <a
                            class="group relative flex items-center gap-2.5 rounded-sm py-2 px-4 font-medium text-bodydark1 duration-300 ease-in-out hover:bg-graydark dark:hover:bg-meta-4"
                            href="{{ route('products.history') }}"
                            @click="selected = (selected === 'Settings' ? '':'Settings')"
                            :class="{ 'bg-graydark dark:bg-meta-4': (selected === 'Settings') && (page === 'settings') }"
                            :class="page === 'settings' && 'bg-graydark'"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"
                                />
                            </svg>

                            Product Log
                        </a>
                    </li>
                    <!-- end::Product Log -->


                </ul>
            </div>
        </nav>
        <!-- Sidebar Menu -->
    </div>
</aside>
