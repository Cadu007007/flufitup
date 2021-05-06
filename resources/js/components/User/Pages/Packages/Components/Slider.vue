<template>
    <div style="width: 100% ">
        <carousel
            :per-page="perpage"
            :navigationEnabled="true"
            :mouse-drag="false"
        >
            <slide v-for="type in types" :key="type.id">
                <div
                    class="slide-type"
                    :class="type.id == selectedTypeId ? 'active' : ''"
                    @click="showTypeItems(type.id)"
                >
                    {{ type.name }}
                </div>
            </slide>
        </carousel>

        <div
            class="d-flex flex-row items-container my-4 by-4 flex-wrap justify-content-start"
        >
            <div
                class="item-container mx-1 mb-2 d-flex flex-row"
                v-for="item in filteredItems"
                :key="item.id"
                :data-price="item.price"
                @click="$emit('itemclicked', item.id)"
            >
                <img :src="formattedurl(item.image)" alt="" class="item-image" />
                <div
                    class="d-flex w-50 flex-column justify-content-center align-items-center"
                >
                    <p class="type mb-2 text-center item-title">
                        {{ item.name }}
                    </p>
                    <p class="item-price text-center">{{ item.price }}$</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Carousel, Slide } from "vue-carousel";

export default {
    data() {
        return {
            filteredItems: [],
            selectedTypeId: 0
        };
    },
    // computed: {
    //      formattedurl: function(url){
    //          alert(url)
    //         return window.location.origin +'/storage' + url
    //     }
    // },
    props: ["types", "typesitems", "perpage"],
    methods: {
        showTypeItems(typeId) {
            console.log("Slider types: ", this.types[0].type); // detergent
            this.selectedTypeId = typeId;
            let filteredItemsArray = [];
            console.log("Type Items: ", this.typesitems[0]);

            let category_id;
            switch (this.types[0].type) {
                case "detergent":
                    for (let i = 0; i < this.typesitems[0].length; i++) {
                        if (
                            this.typesitems[0][i].category_detergents_id ==
                            typeId
                        ) {
                            filteredItemsArray.push(this.typesitems[0][i]);
                        }
                    }
                    break;

                    case "fabric":
                    for (let i = 0; i < this.typesitems[0].length; i++) {
                        if (
                            this.typesitems[0][i].category_fabrics_id ==
                            typeId
                        ) {
                            filteredItemsArray.push(this.typesitems[0][i]);
                        }
                    }
                    break;
                    case "freshener":
                    for (let i = 0; i < this.typesitems[0].length; i++) {
                        if (
                            this.typesitems[0][i].category_fresheners_id ==
                            typeId
                        ) {
                            filteredItemsArray.push(this.typesitems[0][i]);
                        }
                    }
                    break;
            }

            // for (let i = 0; i < this.typesitems[0].length; i++) {
            //     if (this.typesitems[0][i].category_detergents_id == typeId) {
            //         filteredItemsArray.push(this.typesitems[0][i]);
            //     }
            // }

            console.log("filteredItemsArray: ", filteredItemsArray);
            this.filteredItems = filteredItemsArray;

            /* add click action */
            setTimeout(() => {
                $(".item-container").click(function() {
                    $(this)
                    .parent()
                        .find(".item-container")
                        .removeClass("selected-item");
                    $(this).addClass("selected-item");
                    console.log("Price: ", $(this).data("price"));
                });
            }, 500);

            this.$emit("slidechanged");
        },
 formattedurl(url){
            //  alert(url)
            return window.location.origin +'/storage/' + url
        }
       
    },
    components: {
        Carousel,
        Slide
    }
};
</script>

<style lang="scss">
.VueCarousel-dot {
    background-color: #bbb !important;
}

.VueCarousel-dot--active {
    background-color: #333 !important;
}

.slide-type {
    display: flex;
    justify-content: center;
    height: 200px;
    align-items: center;
    border: 1px solid #ccc;
    margin: 0 10px;
    border-radius: 10px;
    &.active {
        border: 1px solid blue;
    }
}

.items-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    justify-content: center;
    align-items: center;
    .item-container {
        height: 100px;
        width: 200px;
        border: 1px solid #ccc;
        border-radius: 10px;
        &.selected-item {
            border: 1px solid blue;
        }
        .item-title{
            width: 95px;
        }
        .item-image {
            width: 100px;
            height: 99%;
            background: #bbb;
            border-radius: inherit;
            border: 1px solid #ccc;
        }
        .item-price {
            font-family: "Lato-Bold";
        }
    }
}
</style>
