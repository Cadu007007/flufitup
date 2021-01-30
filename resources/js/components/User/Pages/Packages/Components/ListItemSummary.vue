<template>
    <div class="ListItemSummary">
        <div class="col-lg-8 mx-auto my-2">
            <div
                class="d-flex flex-column flex-wrap w-100 justify-content-start align-items-start"
            >
            <div class="d-flex flex-row">
                <p class="item-title text-dark font-weight-bold font-size-18">
                    {{ title }}
                </p>
                <p v-if="list.length == 0" class="empty-hint text-center text-muted">{{emptyhint}}</p>

            </div>

                <div class="d-flex flex-row flex-wrap mt-2" v-if="list.length > 0">
                    <div
                    v-for="item in list" :key="item.id"
                    class="d-flex flex-row list-item px-4 py-2 my-2 mx-1">
                        <p class="item-name">{{ item.title }}</p>
                        <p class="item-price ml-2 font-weight-bold" v-if="item.price">
                            ({{ item.price }}$)
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "list","emptyhint"]
};
</script>

<style lang="scss">
.item-title {
    width: 250px;
}
.list-item {
    border: 1px solid #ccc;
    border-radius: 20px;
    text-align: center;
}
</style>
