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
        }
    }
}
</script>