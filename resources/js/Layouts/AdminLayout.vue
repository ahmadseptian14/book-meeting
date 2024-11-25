<template>
    <div>
        <Navbar />
        <Sidebar />
        <div class="wrapper">
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <slot />
            </div>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <Footer />
    </div>
</template>
<script setup>
import Navbar from "@/Components/Navbar.vue";
import Sidebar from "@/Components/Sidebar.vue";
import Footer from "@/Components/Footer.vue";

</script>
