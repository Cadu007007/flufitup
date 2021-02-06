<template>
    <div class="ComponentContainer">
        <div class="HouseholdAccordion">
            <div class="header" @click="changeIsOpenState()">
                <p class="title">{{ title }}</p>
                <img
                    :src="
                        openState
                            ? '/images/icons/arrow-up.svg'
                            : '/images/icons/arrow-down.svg'
                    "
                    alt=""
                />
            </div>
        </div>

        <div
            class="flex-row flex-wrap bg-white py-3"
            :class="openState ? 'd-flex ' : 'd-none'"
        >
            <div
                class="col-lg-6 my-1 mt-2 choiceContainer"
                v-for="(choice, index) in items"
                :key="index"
            >
                <input class="input" type="checkbox" :name="choice.name" />
                <label
                    class="label mx-2"
                    @click="choiceClicked"
                    :for="choice.name"
                    >{{ choice.title }}
                    <b class="ml-2">({{ choice.price }} $)</b>
                </label>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            openState: this.isopen
        };
    },
    props: ["title", "name", "isopen", "items"],
    methods: {
        changeIsOpenState() {
            this.openState = !this.openState;
        },
        choiceClicked(event) {
            let clickedLabel = event.target
            $(clickedLabel).parents(".choiceContainer").find("input").click()
        }
    }
};
</script>

<style lang="scss">
$white: #ffffff;
$black: #000000;
$grey: #f1f3f7;
$shadow: 0px 0px 10px #0000001a;
.ComponentContainer {
    width: 100%;
    .HouseholdAccordion {
        width: 100%;
        box-shadow: $shadow;
        border-radius: 10px 10px 0px 0px;
        .header {
            height: 60px;
            background: $grey;
            padding: 16px 24px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            .title {
                font-size: 18px;
            }
        }
    }
}
</style>
