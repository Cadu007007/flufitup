<template>
    <div class="TailoredPackageQuestion">
        <div class="flex-column-center">
            <input
                type="text"
                class="item-title"
                placeholder="Question"
                v-model="itemQuestion"
            />

            <p class="choices-title" v-if="choices.length">The Choices</p>

            <Tailored-Package-Choice
                v-for="(choice, index) in loadedanswers"
                :key="index"
                :text="choice.text"
                @delete-item="deleteItem(index)"
            />

            <p class="add-more-choice" @click="addNewType">Add more choices</p>

        <div class="seperator"></div>
        </div>
    </div>
</template>

<script>
import TailoredPackageChoice from "./TailoredPackageChoice";
export default {
        props: ['title','date','question','choices'],

    data() {
        return {
            loadedanswers: this.choices,
            itemQuestion: this.question
        };
    },
    components: {
        TailoredPackageChoice
    },
    methods: {
        addNewType() {
            this.loadedanswers.push({ label: "", price: "", img:"" });
        },
        deleteItem(index) {
            this.loadedanswers.splice(index, 1);
        }
    }
};
</script>

<style lang="scss">
.TailoredPackageQuestion {
    margin-top: 20px;
    .flex-column-center {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        .item-title {
            width: 812px;
            height: 45px;
            background: #f9f9f9;
            padding: 13px 15px;
            border: 2px solid #ededed;
            border-radius: 7px;
            margin-bottom: 20px;
        }
        .choices-title {
            margin-bottom: 10px;
        }
        .add-more-choice{
            color: #22AEE4;
            margin-bottom: 20px;
        }
        .seperator{
            width: 100%;
            height: 1px;
            background: #ccc;
            margin: 20px 0;
        }
    }
}
</style>
