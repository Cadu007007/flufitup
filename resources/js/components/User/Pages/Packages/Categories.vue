<template>
    <div class="Categories">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="column">
            <div class="column" v-if="editCategoryId == 0">
                <div class="row">
                    <div class="category-name">
                        <p class="title">Category Name:</p>
                        <input
                            type="text"
                            class="category-name-input"
                            name="category_name"
                            placeholder="Category Name"
                        />
                    </div>

                    <div class="category-type">
                        <p class="title">Category For:</p>

                        <select
                            name="type"
                            id=""
                            class="select2"
                            style="width: 400px"
                        >
                            <option>Choose a type</option>
                            <option value="detergents">Detergents</option>
                            <option value="fabric_softener"
                                >Fabric Softener</option
                            >
                            <option value="dryer_sheet">Dryer Sheet</option>
                            <option value="scent_booster">Scent Booster</option>
                        </select>
                    </div>
                </div>

                <div class="button-container">
                    <button class="save-button">Add Category</button>
                </div>
            </div>
            <div class="column" v-else>
                <div class="row">
                    <div class="category-name">
                        <p class="title">Category Name:</p>
                        <input
                            type="text"
                            class="category-name-input"
                            name="category_name"
                            placeholder="Category Name"
                            v-model="editCategoryName"
                        />
                        <input
                            type="hidden"
                            name="category_id"
                            v-model="editCategoryId"
                        />
                    </div>
                    <div class="category-type">
                        <p class="title">Category For:</p>

                        <select
                            name="category_type"
                            id=""
                            class="select2 edit-select2"
                            style="width: 400px"
                        >
                            <option value="detergents">Detergents</option>
                            <option value="fabric_softener"
                                >Fabric Softener</option
                            >
                            <option value="dryer_sheet">Dryer Sheet</option>
                            <option value="scent_booster">Scent Booster</option>
                        </select>
                    </div>
                </div>

                <div class="button-container" style="width: 40%">
                    <button class="save-button">Save</button>
                    <button class="cancel-button" @click="editCategoryId = 0">
                        Cancel
                    </button>
                </div>
            </div>

            <div class="seperator"></div>

            <div class="page-header">
                <p class="title" style="margin: 5px 0">Added Categories</p>
            </div>

            <div class="categories-container">
                <div
                    class="category-container"
                    v-for="category in categories"
                    :key="category.id"
                >
                    <p class="category-title">
                        {{ category.name }}
                    </p>
                    <p class="">
                        {{ format(category.type) }}
                    </p>
                    <div
                        class="column"
                        style="width: 100%; margin-bottom: 10px"
                    >
                        <button
                            class="button edit"
                            @click="editCategory(category.id)"
                        >
                            Edit
                        </button>
                        <button
                            class="button delete"
                            @click="deleteCategory(category.id)"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            editCategoryName: "",
            editCategoryId: 0,
            editCategoryType: ""
        };
    },
    components: {},
    props: ["title", "date", "categories"],
    methods: {
        editCategory(CategoryId) {
            let selectedCategory = this.categories.find(
                x => x.id == CategoryId
            );
            this.editCategoryName = selectedCategory.name;
            this.editCategoryId = selectedCategory.id;
            this.editCategoryType = selectedCategory.type;

            setTimeout(() => {
                $(".edit-select2").select2();
                $(".edit-select2")
                    .val(this.editCategoryType)
                    .change();
            }, 100);
        },
        format(typeName){
            return typeName.replace('_', ' ')
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;
$red: rgb(207, 42, 42);

.Categories {
    width: 100%;
    height: 80vh;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .column {
        display: flex;
        flex-direction: column;
    }

    .button-container {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        margin: 10px auto;
        .save-button {
            margin: 30px auto;
            padding: 10px 40px;
            height: 45px;
            border-radius: 25px;
            background: $blue;
            color: #fff;
            font-size: 18px;
        }
        .cancel-button {
            margin: 30px auto;
            padding: 10px 40px;
            height: 45px;
            border-radius: 25px;
            color: $red;
            border: 1px solid $red;
            background: #fff;
            font-size: 18px;
        }
    }

    .category-name {
        width: 612px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 0 auto;
        .title {
            color: $text-grey;
            font-size: 16px;
            width: 160px !important;
        }
        .center-title {
            position: relative;
            left: 70px;
            text-align: center;
        }
        .category-name-input {
            width: 580px;
            background: #f9f9f9;
            border: 2px solid #ededed;
            border-radius: 7px;
            margin: 0 0 0 40px;

            padding: 12px;
        }
    }

    .category-type {
        width: 612px;
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: center;
        margin: 10px auto;
        .title {
            color: $text-grey;
            font-size: 16px;
            width: 160px !important;
        }
        .center-title {
            position: relative;
            left: 70px;
            text-align: center;
        }
        .category-name-input {
            width: 580px;
            background: #f9f9f9;
            border: 2px solid #ededed;
            border-radius: 7px;
            margin: 0 0 0 40px;

            padding: 12px;
        }
    }

    .seperator {
        width: 100%;
        height: 1px;
        margin: 10px 0;
        background: #ccc;
    }
    .categories-container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        .category-container {
            width: 200px;
            height: 190px;
            margin: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 20px;

            .category-title {
                width: 100%;
                text-align: center;
                margin: 20px auto;
                font-size: 20px;
            }
            .button {
                width: 90%;
                margin: 5px auto;
                height: 40px;
                border-radius: 20px;
                font-size: 14px;
                font-family: "Open-Sans-Bold";
                background: #fff;
                &.edit {
                    border: 2px solid #ffa800;
                    color: #ffa800;
                }
                &.delete {
                    border: 2px solid #ff0000;
                    color: #ff0000;
                }
            }
        }
    }
}
</style>
