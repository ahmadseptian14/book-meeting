<template>
    <section class="h-100 gradient-form" style="background-color: #eee">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219"></i>
                                        <h4 class="mt-1 mb-5 pb-1">
                                            Selamat datang di website Booking Vicon
                                            terbaru
                                        </h4>
                                    </div>
                                    <form @submit.prevent="submit()">
                                        <p>Silahkan Login Terlebih dahulu</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="orgeh">Orgeh</label>
                                            <input v-model="form.orgeh" type="text" id="orgeh" class="form-control" />
                                            <div v-if="errors.orgeh" class="text-danger">
                                                {{ errors.orgeh }}
                                            </div>
                                        </div>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <label class="form-label" for="password">Password</label>
                                            <input v-model="form.password" type="password" id="password"
                                                class="form-control" />
                                            <div v-if="errors.password" class="text-danger">
                                                {{ errors.password }}
                                            </div>
                                        </div>
                                        <button type="submit" class="btn bg-primary-2 text-white">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center bg-primary-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h2 class="mb-4">
                                        Informasi Penting!!
                                    </h2>
                                    <p class="mb-0">
                                       Sekarang untuk melakukan booking vicon tidak perlu booking ruangan terlebih dahulu,
                                       jadi bisa langsung booking vicon (Meeting ID Zoom) saja. Dan apabila ingin menggunakan
                                       ruangan saja tanpa vicon (Meeting ID Zoom) anda bisa melakukan booking ruangan saja.
                                        Terima Kasih
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3"
import { useToast } from "vue-toastification"

defineProps({ errors: Object })

const form = useForm({
    orgeh: "",
    password: "",
})

const toast = useToast()

const submit = async () => {
    await form.post(route("login"), {
        onSuccess: (response) => {
            console.log(response)
            toast.success("Login berhasil!")
        },
        onError: (errors) => {
            console.log(errors)
            toast.error("Login gagal. Silakan cek orgeh dan passsword anda.")
        },
    })
}
</script>

<style scoped>
.bg-primary-2 {
    background: #1d0c59;
}
.bg-primary-2:hover {
    background: #17094a; /* Warna ketika di-hover */
}
</style>
