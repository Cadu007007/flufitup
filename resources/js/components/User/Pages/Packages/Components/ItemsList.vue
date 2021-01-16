<template>
    <div class="ItemsList">
        <p class="title font-weight-bold my-4 text-center text-primary">{{ title }}</p>

            <div class="d-flex flex-row flex-wrap">

                <div v-for="item in items" :key="item.id"
                class="row w-50 d-flex flex-row justify-content-center my-2">
                   <p class="mr-4">{{item.title}}</p>
                   <b class="mr-4">${{item.price}}</b>
                   <input style="width: 50px" type="checkbox" :name="item.name">
                </div>
                
        </div>
    </div>
</template>

<script>
export default {
    props: ["items",'title']
};
</script>

<style lang="scss">
.ItemsList .title{
    font-size: 20px;
}
</style>
