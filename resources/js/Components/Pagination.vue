<template>
    <div v-if="links.length > 0">
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end mb-4">
                <template v-for="(link, linkIndex) in links" :key="linkIndex">
                    <li class="page-item" :class="{'disabled': link.url === null}">
                        <Link
                            v-if="link.url !== null"
                            class="page-link"
                            :class="{'active': link.active}"
                            :href="link.url"
                        >
                            <span v-html="link.label"></span>
                        </Link>
                        <div
                            v-else
                            class="page-link text-muted"
                            v-html="link.label"
                        >
                        </div>
                    </li>
                </template>
            </ul>
        </nav>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array
})
</script>
