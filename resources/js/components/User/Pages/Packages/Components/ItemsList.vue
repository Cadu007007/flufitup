<template>
    <div class="ItemsList">
        <p class="title font-weight-bold my-4 text-center text-primary">
            {{ title }}
        </p>

        <div class="d-flex flex-row flex-wrap">
            <div
                v-for="item in items"
                :key="item.id"
                class="row w-50 d-flex flex-row justify-content-center my-2"
            >
                <p class="mr-4 itemTitle">{{ item.title }}</p>
                <b class="mr-4">${{ item.price }}</b>
                <input
                    style="width: 50px; height: 24px"
                    type="checkbox"
                    class="checkbox"
                    :data-price="item.price"
                    :name="item.name"
                />
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        // setTimeout(() => {
        //     $(".itemTitle").click(function() {
        //         let checkbox = $(this)
        //             .parent()
        //             .find(".checkbox");

        //             console.log("checkbox: ", checkbox);
        //         if (!checkbox.attr("checked")) {
        //             checkbox.attr("checked", true);
        //         }
        //         else if (checkbox.attr("checked")) {
        //             checkbox.removeAttr("checked");
        //         }
        //     });

        //     $(".itemTitle").each((index,item) => {
        //         console.log("Item: ", item);
        //     })
        // }, 500);
    },
    props: ["items", "title"]
};
</script>

<style lang="scss">
.ItemsList .title {
    font-size: 20px;
}
</style>
