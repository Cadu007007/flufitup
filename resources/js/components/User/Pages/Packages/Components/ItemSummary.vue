<template>
    <div class="ItemSummary">
        <div class="col-lg-8 mx-auto my-2">
            <div
                class="d-flex flex-row flex-wrap w-100 justify-content-start align-items-center"
            >
                <p class="item-title text-dark font-weight-bold font-size-18">
                    {{ title }}
                </p>
                <p class="item-value">{{ value }}</p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "value"]
};
</script>

<style lang="scss">
.item-title {
    width: 250px;
}
</style>
