<template>
    <div class="w-full">
        <div class="card">
            <ul class="list-group list-group-flush">
                <li class="list-group-item" v-for="i in num" :key="i">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="skeleton-avatar"></div>
                        </div>
                        <div class="col-7">
                            <div class="skeleton-line"></div>
                            <div class="skeleton-line"></div>
                        </div>
                        <div class="col-2 ms-auto text-end">
                            <div class="skeleton-line"></div>
                            <div class="skeleton-line"></div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        num: { default: 6 }
    }
}
</script>

<style></style>
