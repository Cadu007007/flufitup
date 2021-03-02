<template>
    <div class="Categories">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <div class="column">
            <form
                class="add-form"
                action=""
                method="POST"
                @submit="submitAddForm"
            >
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column" v-show="editCategoryId == 0">
                    <div class="row">
                        <div class="category-name">
                            <p class="title">Category Name:</p>
                            <input
                                type="text"
                                class="category-name-input addCategoryName"
                                name="name"
                                placeholder="Category Name"
                                required
                            />
                        </div>

                        <div class="category-type">
                            <p class="title">Category For:</p>

                            <select
                                name="type"
                                id=""
                                class="select2 addCategoryType"
                                style="width: 400px"
                                required
                            >
                                <option :value="null">Choose a type</option>
                                <option value="detergents">Detergents</option>
                                <option value="fabric">Fabric Softener</option>
                                <option value="dryer">Dryer Sheet</option>
                                <option value="scent">Scent Booster</option>
                            </select>
                        </div>
                    </div>

                    <div class="button-container">
                        <button class="save-button" type="submit">
                            Add Category
                        </button>
                    </div>
                </div>
            </form>

            <form
                class="edit-form"
                action=""
                method="POST"
                @submit="submitEditForm"
            >
                <input type="hidden" :value="csrf" name="_token" />

                <div class="column" v-show="editCategoryId > 0">
                    <div class="row">
                        <div class="category-name">
                            <p class="title">Category Name:</p>
                            <input
                                type="text"
                                class="category-name-input editCategoryName"
                                name="name"
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
                                name="type"
                                id=""
                                class="select2 edit-select2 editCategoryType"
                                style="width: 400px"
                            >
                                <option value="detergents">Detergents</option>
                                <option value="fabric">Fabric Softener</option>
                                <option value="dryer">Dryer Sheet</option>
                                <option value="scent">Scent Booster</option>
                            </select>
                        </div>
                    </div>

                    <div class="button-container" style="width: 40%">
                        <button class="save-button" type="submit">Save</button>
                        <button
                            class="cancel-button"
                            @click="editCategoryId = 0"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </form>

            <div class="seperator"></div>

            <div class="page-header">
                <p
                    class="title"
                    style="margin: 5px 0"
                    v-if="loadedCategories.length > 0"
                >
                    Added Categories
                </p>
            </div>

            <div class="categories-container">
                <div
                    class="category-container"
                    v-for="category in loadedCategories"
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
                        <form
                            action=""
                            class="delete-form column"
                            method="POST"
                        >
                            <input type="hidden" :value="csrf" name="_token" />
                            <input
                                type="hidden"
                                name="id"
                                class="categoryId"
                                :value="category.id"
                            />
                            <input
                                type="hidden"
                                name="type"
                                class="categoryType"
                                :value="category.type"
                            />
                            <button
                                class="button delete"
                                type="button"
                                @click="deleteItem($event)"
                            >
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        setTimeout(() => {
            $(".category-name-input").change(function(event) {
                if (event.target.value.length == 0) {
                    $(event.target).removeAttr("required");
                } else {
                    $(event.target).attr("required", true);
                }
            });
            $(".addCategoryType").change(function(event) {
                this.selectedType = $(event.target)
                    .val()
                    .trim();
                //console.log("selectedType: ", this.selectedType);
            });
        }, 1000);
    },
    data() {
        return {
            editCategoryName: "",
            editCategoryId: 0,
            editCategoryType: "",
            selectedType: "",
            loadedCategories: this.categories,
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    components: {},
    props: [
        "title",
        "date",
        "categories",
        "addformroutedetergents",
        "editformroutedetergents",
        "deleteformroutedetergents",
        "addformroutefabric",
        "editformroutefabric",
        "deleteformroutefabric",
        "addformroutedryer",
        "editformroutedryer",
        "deleteformroutedryer",
        "addformroutescent",
        "editformroutescent",
        "deleteformroutescent"
    ],
    methods: {
        editCategory(CategoryId) {
            let selectedCategory = this.loadedCategories.find(
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
        format(typeName) {
            return typeName.replace("_", " ");
        },
        clearAddInputs() {
            $(".addCategoryName")
                .val("")
                .change();
            $(".addCategoryType")
                .val(null)
                .change();
        },
        clearEditInputs() {
            $(".editCategoryName")
                .val("")
                .change();
            $(".editCategoryType")
                .val(null)
                .change();
        },
        submitAddForm(event) {
            event.preventDefault();
            var formValues = $(".add-form").serialize();
            // //console.log("formValues: ", formValues);
            let selectedURL;
            let detergentsURL = this.addformroutedetergents;
            let fabricURL = this.addformroutefabric;
            let dryerURL = this.addformroutedryer;
            let scentURL = this.addformroutescent;

            let selectedType = $(".addCategoryType").val();
            if (selectedType == "detergents") {
                selectedURL = detergentsURL;
                //console.log("detergents");
            } else if (selectedType == "fabric") {
                selectedURL = fabricURL;
                //console.log("fabric");
            } else if (selectedType == "dryer") {
                selectedURL = dryerURL;
                //console.log("dryer");
            } else if (selectedType == "scent") {
                selectedURL = scentURL;
                //console.log("scent");
            } else {
                //console.log("Not In IF");
                //console.log(selectedType);
            }
            //console.log("selectedURL: ", selectedURL);
            let addStatus;
            axios({
                url: selectedURL,
                method: "POST",
                data: formValues
            })
                .then(response => {
                    console.log("data: ", response.data);
                    if (response.data.success) {
                        addStatus = true;
                        this.loadedCategories.push({
                            id: response.data.data.id,
                            name: response.data.data.name,
                            type: selectedType
                        });
                        //console.log("categories: ", this.loadedCategories);
                    }
                })
                .then(() => {
                    console.log("addStatus: ", addStatus);
                    if (addStatus) {
                        this.clearAddInputs();
                    }
                });
        },
        submitEditForm(event) {
            event.preventDefault();
            var formValues = $(event.target).serialize();
            //console.log("formValues: ", formValues);
            let selectedURL;
            let detergentsURL = this.editformroutedetergents.replace(
                "category_id",
                this.editCategoryId
            );
            let fabricURL = this.editformroutefabric.replace(
                "category_id",
                this.editCategoryId
            );
            let dryerURL = this.editformroutedryer.replace(
                "category_id",
                this.editCategoryId
            );
            let scentURL = this.editformroutescent.replace(
                "category_id",
                this.editCategoryId
            );

            let selectedType = $(event.target)
                .find(".editCategoryType")
                .val();
            if (selectedType == "detergents") {
                selectedURL = detergentsURL;
                //console.log("detergents");
            } else if (selectedType == "fabric") {
                selectedURL = fabricURL;
                //console.log("fabric");
            } else if (selectedType == "dryer") {
                selectedURL = dryerURL;
                //console.log("dryer");
            } else if (selectedType == "scent") {
                selectedURL = scentURL;
                //console.log("scent");
            } else {
                //console.log("Not In IF");
                //console.log(selectedType);
            }
            //console.log("selectedURL: ", selectedURL);
            let editStatus;

            axios({
                url: selectedURL,
                method: "PUT",
                data: formValues
            })
                .then(response => {
                    //console.log("data: ", response.data);
                    if (response.data.success) {
                        editStatus = true;

                        //console.log("EDIT SUCCESS");
                        this.loadedCategories.find(
                            x => x.id == response.data.data.id
                        ).name = response.data.data.name;
                        this.loadedCategories.find(
                            x => x.id == response.data.data.id
                        ).type = selectedType;

                        //console.log("categories: ", this.loadedCategories);
                    }
                })
                .then(() => {
                    console.log("editStatus: ", editStatus);
                    if (editStatus) {
                        this.editCategoryId = 0;
                    }
                });
        },
        deleteItem(event) {
            let deleteForm = $(event.target).parent();
            //console.log("deleteForm: ", deleteForm);

            let categoryId = $(deleteForm)
                .find(".categoryId")
                .val();
            if (confirm("Are You Sure ?")) {
                var formValues = $(deleteForm).serialize();
                //console.log("formValues: ", formValues);
                let selectedURL;
                let detergentsURL = this.deleteformroutedetergents.replace(
                    "category_id",
                    categoryId
                );
                let fabricURL = this.deleteformroutefabric.replace(
                    "category_id",
                    categoryId
                );
                let dryerURL = this.deleteformroutedryer.replace(
                    "category_id",
                    categoryId
                );
                let scentURL = this.deleteformroutescent.replace(
                    "category_id",
                    categoryId
                );

                let selectedType = $(deleteForm)
                    .find(".categoryType")
                    .val();
                if (selectedType == "detergents") {
                    selectedURL = detergentsURL;
                    //console.log("detergents");
                } else if (selectedType == "fabric") {
                    selectedURL = fabricURL;
                    //console.log("fabric");
                } else if (selectedType == "dryer") {
                    selectedURL = dryerURL;
                    //console.log("dryer");
                } else if (selectedType == "scent") {
                    selectedURL = scentURL;
                    //console.log("scent");
                } else {
                    //console.log("Not In IF");
                    //console.log(selectedType);
                }
                //console.log("selectedURL: ", selectedURL);

                axios({
                    url: selectedURL,
                    method: "DELETE",
                    data: formValues
                }).then(response => {
                    //console.log("data: ", response.data);
                    if (response.data.success) {
                        //console.log("DELETE SUCCESS");
                        //console.log("List: ", this.loadedCategories);
                        let filteredCategories = this.loadedCategories.filter(
                            x => x.id != categoryId
                        );
                        //console.log("filteredCategories: ", filteredCategories);
                        this.loadedCategories = filteredCategories;
                    }
                });
            }
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
