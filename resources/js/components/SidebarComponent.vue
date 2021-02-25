<template>
     <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">

                    <a class="nav-link text-white mt-2" :href="admin_home">
                        <i class="fa fa-home mr-2"></i>Dashboard
                    </a>

                    <a class="nav-link text-white mt-2" :href="admin_companies">
                        <i class="fa fa-building mr-2"></i> Companies
                    </a>

                    <a class="nav-link text-white mt-2" :href="admin_employees">
                        <i class="fa fa-users mr-2"></i> Employees
                    </a>

                    <a class="nav-link text-white mt-2" :href="admin_logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                    </a>

                    <form id="logout-form" :action="admin_logout" method="POST" class="d-none">
                        <input type="hidden" name="_token" :value="csrf_token">
                    </form>
                    
                </div>
            </div>
            
        </nav>
    </div>
</template>
<script>
export default {
    props: {
        admin_home: {
            required: true,
            type: String
        },
        admin_companies :{
            required: true,
            type: String
        },
        admin_employees :{
            required: true,
            type: String
        },
        admin_logout : {
            required:true,
            type: String
        },
        csrf_token : {
            required:true,
            type: String
        }
        
    }
}
</script>