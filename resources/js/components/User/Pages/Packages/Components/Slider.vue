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
                    {{ type.title }}
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
                <img :src="item.src" alt="" class="item-image" />
                <div
                    class="d-flex w-50 flex-column justify-content-center align-items-center"
                >
                    <p class="type mb-2 text-center item-title">
                        {{ item.title }}
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
    props: ["types", "typesitems", "perpage"],
    methods: {
        showTypeItems(typeId) {
            this.selectedTypeId = typeId;
            let filteredItemsArray = [];
            for (let i = 0; i < this.typesitems.length; i++) {
                if (this.typesitems[i].type_id == typeId) {
                    filteredItemsArray.push(this.typesitems[i]);
                }
            }
            this.filteredItems = filteredItemsArray;



            /* add click action */
            setTimeout(() => {
                $(".item-container").click(function() {
                    $(this).find(".item-container").removeClass("selected-item");
                    $(this).addClass("selected-item");
                    console.log("Price: ", $(this).data('price'));
                });
            }, 500);


            this.$emit('slidechanged')

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
