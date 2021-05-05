<template>
    <div class="Categories">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
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
                                <option value="detergent">Detergents</option>
                                <option value="fabric">Fabric Softener</option>
                                <option value="dryer">Dryer Sheet</option>
                                <option value="scent">Scent Booster</option>
                                <option value="freshener">Freshener</option>
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
                                disabled
                            >
                                <option value="detergent">Detergents</option>
                                <option value="fabric">Fabric Softener</option>
                                <option value="dryer">Dryer Sheet</option>
                                <option value="scent">Scent Booster</option>
                                <option value="freshener">Freshener</option>

                            </select>
                        </div>
                    </div>

                    <div class="button-container" style="width: 40%">
                        <button class="save-button" type="submit">Save</button>
                        <button
                            type="button"
                            class="cancel-button"
                            @click="editCategoryId = 0"
                        >
                            Cancel
                        </button>
                    </div>
                </div>
            </form>

            <!-- Detergents -->

            <div
                class="seperator"
                v-if="loadeddetergentCategories.length > 0"
            ></div>

            <div class="column" v-if="loadeddetergentCategories.length > 0">
                <div class="page-header">
                    <p class="title" style="margin: 5px 0">
                        Detergents Categories
                    </p>
                </div>

                <div class="categories-container">
                    <div
                        class="category-container"
                        v-for="category in loadeddetergentCategories"
                        :key="category.id"
                    >
                        <p class="category-title">
                            {{ category.name }}
                        </p>
                        <p class="d-none">
                            {{ format(category.type) }}
                        </p>
                        <div
                            class="d-flex flex-row justify-content-center my-2 flex-wrap"
                            style="width: 620px;"
                        >
                            <button
                                class="button edit"
                                @click="editCategory(category)"
                            >
                                Edit
                            </button>
                            <form
                                action=""
                                class="delete-form column"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    :value="csrf"
                                    name="_token"
                                />
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

            <!-- Fabric -->

            <div
                class="seperator"
                v-if="loadedfabricCategories.length > 0"
            ></div>
            <div class="column" v-if="loadedfabricCategories.length > 0">
                <div class="page-header">
                    <p class="title" style="margin: 5px 0">
                        Fabric Softener Categories
                    </p>
                </div>

                <div class="categories-container">
                    <div
                        class="category-container"
                        v-for="category in loadedfabricCategories"
                        :key="category.id"
                    >
                        <p class="category-title">
                            {{ category.name }}
                        </p>
                        <p class="d-none">
                            {{ format(category.type) }}
                        </p>
                        <div
                            class="d-flex flex-row justify-content-center my-2 flex-wrap"
                            style="width: 620px;"
                        >
                            <button
                                class="button edit"
                                @click="editCategory(category)"
                            >
                                Edit
                            </button>
                            <form
                                action=""
                                class="delete-form column"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    :value="csrf"
                                    name="_token"
                                />
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

            <!-- Dryer -->

            <div
                class="seperator"
                v-if="loadeddryerCategories.length > 0"
            ></div>
            <div class="column" v-if="loadeddryerCategories.length > 0">
                <div class="page-header">
                    <p class="title" style="margin: 5px 0">
                        Dryer Sheets Categories
                    </p>
                </div>

                <div class="categories-container">
                    <div
                        class="category-container"
                        v-for="category in loadeddryerCategories"
                        :key="category.id"
                    >
                        <p class="category-title">
                            {{ category.name }}
                        </p>
                        <p class="d-none">
                            {{ format(category.type) }}
                        </p>
                        <div
                            class="d-flex flex-row justify-content-center my-2 flex-wrap"
                            style="width: 620px;"
                        >
                            <button
                                class="button edit"
                                @click="editCategory(category)"
                            >
                                Edit
                            </button>
                            <form
                                action=""
                                class="delete-form column"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    :value="csrf"
                                    name="_token"
                                />
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

            <!-- Scent Booster -->
            <div
                class="seperator"
                v-if="loadedscentCategories.length > 0"
            ></div>
            <div class="column" v-if="loadedscentCategories.length > 0">
                <div class="page-header">
                    <p class="title" style="margin: 5px 0">
                        Scent Booster Categories
                    </p>
                </div>

                <div class="categories-container">
                    <div
                        class="category-container"
                        v-for="category in loadedscentCategories"
                        :key="category.id"
                    >
                        <p class="category-title">
                            {{ category.name }}
                        </p>
                        <p class="d-none">
                            {{ format(category.type) }}
                        </p>
                        <div
                            class="d-flex flex-row justify-content-center my-2 flex-wrap"
                            style="width: 620px;"
                        >
                            <button
                                class="button edit"
                                @click="editCategory(category)"
                            >
                                Edit
                            </button>
                            <form
                                action=""
                                class="delete-form column"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    :value="csrf"
                                    name="_token"
                                />
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
            <!-- Fresheners  -->
            <div
                class="seperator"
                v-if="loadedfreshenerCategories.length > 0"
            ></div>
            <div class="column" v-if="loadedfreshenerCategories.length > 0">
                <div class="page-header">
                    <p class="title" style="margin: 5px 0">
                        Fresheners Categories
                    </p>
                </div>

                <div class="categories-container">
                    <div
                        class="category-container"
                        v-for="category in loadedfreshenerCategories"
                        :key="category.id"
                    >
                        <p class="category-title">
                            {{ category.name }}
                        </p>
                        <p class="d-none">
                            {{ format(category.type) }}
                        </p>
                        <div
                            class="d-flex flex-row justify-content-center my-2 flex-wrap"
                            style="width: 620px;"
                        >
                            <button
                                class="button edit"
                                @click="editCategory(category)"
                            >
                                Edit
                            </button>
                            <form
                                action=""
                                class="delete-form column"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    :value="csrf"
                                    name="_token"
                                />
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
            // loadedCategories: this.categories,
            loadeddetergentCategories: this.detergetscategories,
            loadeddryerCategories: this.dryercategories,
            loadedfabricCategories: this.fabriccategories,
            loadedscentCategories: this.scentcategories,
            loadedfreshenerCategories: this.freshenercategories,
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
        "deleteformroutescent",
        "addformroutefreshener",
        "editformroutefreshener",
        "deleteformroutefreshener",
        "detergetscategories",
        "fabriccategories",
        "dryercategories",
        "scentcategories",
        "freshenercategories",
    ],
    methods: {
        editCategory(Category) {
            console.log("Category: ", Category);
            let selectedCategory;
            let selectorValue;
            if (Category.type == "detergent") {
                selectedCategory = this.loadeddetergentCategories.find(
                    x => x.id == Category.id
                );
                selectorValue = "detergent";
            } else if (Category.type == "fabric") {
                selectedCategory = this.loadedfabricCategories.find(
                    x => x.id == Category.id
                );
                selectorValue = "fabric";
            } else if (Category.type == "dryer") {
                selectedCategory = this.loadeddryerCategories.find(
                    x => x.id == Category.id
                );
                selectorValue = "dryer";
            } else if (Category.type == "scent") {
                selectedCategory = this.loadedscentCategories.find(
                    x => x.id == Category.id
                );
                selectorValue = "scent";
            } else if (Category.type == "freshener") {
                selectedCategory = this.loadedfreshenerCategories.find(
                    x => x.id == Category.id
                );
                selectorValue = "freshener";
            }

            this.editCategoryName = selectedCategory.name;
            this.editCategoryId = selectedCategory.id;
            this.editCategoryType = selectedCategory.type;

            setTimeout(() => {
                $(".edit-select2").select2();
                $(".edit-select2")
                    .val(selectorValue)
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
            let freshenerURL = this.addformroutefreshener;

            let detergentsArray =
                this.loadeddetergentCategories.length > 0
                    ? this.loadeddetergentCategories
                    : [];
            let fabricsArray =
                this.loadedfabricCategories.length > 0
                    ? this.loadedfabricCategories
                    : [];
            let dryersArray =
                this.loadeddryerCategories.length > 0
                    ? this.loadeddryerCategories
                    : [];
            let scentsArray =
                this.loadedscentCategories.length > 0
                    ? this.loadedscentCategories
                    : [];
            let freshenersArray =
                this.loadedfreshenerCategories.length > 0
                    ? this.loadedfreshenerCategories
                    : [];

            let selectedType = $(".addCategoryType").val();
            if (selectedType == "detergent") {
                selectedURL = detergentsURL;
                //console.log("detergent");
            } else if (selectedType == "fabric") {
                selectedURL = fabricURL;
                //console.log("fabric");
            } else if (selectedType == "dryer") {
                selectedURL = dryerURL;
                //console.log("dryer");
            } else if (selectedType == "scent") {
                selectedURL = scentURL;
                //console.log("scent");
            } else if (selectedType == "freshener") {
                selectedURL = freshenerURL;
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
                        this.showSuccessMessage(response.data.message);
                        /* push data to the suitable array */
                        if (selectedType == "detergent") {
                            detergentsArray.push({
                                id: response.data.data.id,
                                name: response.data.data.name,
                                type: selectedType
                            });
                            //console.log("detergent");
                        } else if (selectedType == "fabric") {
                            fabricsArray.push({
                                id: response.data.data.id,
                                name: response.data.data.name,
                                type: selectedType
                            });
                            //console.log("fabric");
                        } else if (selectedType == "dryer") {
                            dryersArray.push({
                                id: response.data.data.id,
                                name: response.data.data.name,
                                type: selectedType
                            });
                            //console.log("dryer");
                        } else if (selectedType == "scent") {
                            scentsArray.push({
                                id: response.data.data.id,
                                name: response.data.data.name,
                                type: selectedType
                            });
                            //console.log("scent");
                        }
                         else if (selectedType == "freshener") {
                            freshenersArray.push({
                                id: response.data.data.id,
                                name: response.data.data.name,
                                type: selectedType
                            });
                            //console.log("scent");
                        }

                        //console.log("categories: ", this.loadedCategories);
                    }
                })
                .then(() => {
                    console.log("addStatus: ", addStatus);
                    if (addStatus) {
                        this.clearAddInputs();
                    }
                });

            this.loadeddetergentCategories = detergentsArray;
            this.loadedfabricCategories = fabricsArray;
            this.loadeddryerCategories = dryersArray;
            this.loadedscentCategories = scentsArray;
            this.loadedfreshenerCategories = freshenersArray;
        },
        submitEditForm(event) {
            event.preventDefault();
            var formValues = $(event.target).serialize();

            let detergentsArray =
                this.loadeddetergentCategories.length > 0
                    ? this.loadeddetergentCategories
                    : [];
            let fabricsArray =
                this.loadedfabricCategories.length > 0
                    ? this.loadedfabricCategories
                    : [];
            let dryersArray =
                this.loadeddryerCategories.length > 0
                    ? this.loadeddryerCategories
                    : [];
            let scentsArray =
                this.loadedscentCategories.length > 0
                    ? this.loadedscentCategories
                    : [];
            let freshenersArray =
                this.loadedfreshenerCategories.length > 0
                    ? this.loadedfreshenerCategories
                    : [];

console.log("freshenersArray: ", freshenersArray);

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
            
            let freshenerURL = this.editformroutefreshener.replace(
                "category_id",
                this.editCategoryId
            );

            let selectedType = $(event.target)
                .find(".editCategoryType")
                .val();
            if (selectedType == "detergent") {
                selectedURL = detergentsURL;
                //console.log("detergent");
            } else if (selectedType == "fabric") {
                selectedURL = fabricURL;
                //console.log("fabric");
            } else if (selectedType == "dryer") {
                selectedURL = dryerURL;
                //console.log("dryer");
            } else if (selectedType == "scent") {
                selectedURL = scentURL;
                //console.log("scent");
            } else if (selectedType == "freshener") {
                selectedURL = freshenerURL;
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

                        this.showSuccessMessage(response.data.message);
                        if (selectedType == "detergent") {
                            detergentsArray.find(
                                x => x.id == response.data.data.id
                            ).name = response.data.data.name;
                            detergentsArray.find(
                                x => x.id == response.data.data.id
                            ).type = selectedType;
                            //console.log("detergent");
                        } else if (selectedType == "fabric") {
                            fabricsArray.find(
                                x => x.id == response.data.data.id
                            ).name = response.data.data.name;
                            fabricsArray.find(
                                x => x.id == response.data.data.id
                            ).type = selectedType;
                            //console.log("fabric");
                        } else if (selectedType == "dryer") {
                            dryersArray.find(
                                x => x.id == response.data.data.id
                            ).name = response.data.data.name;
                            dryersArray.find(
                                x => x.id == response.data.data.id
                            ).type = selectedType;
                            //console.log("dryer");
                        } else if (selectedType == "scent") {
                            scentsArray.find(
                                x => x.id == response.data.data.id
                            ).name = response.data.data.name;
                            scentsArray.find(
                                x => x.id == response.data.data.id
                            ).type = selectedType;
                            //console.log("scent");
                        } else if (selectedType == "freshener") {
                            freshenersArray.find(
                                x => x.id == response.data.data.id
                            ).name = response.data.data.name;
                            freshenersArray.find(
                                x => x.id == response.data.data.id
                            ).type = selectedType;
                            //console.log("scent");
                        }

                        //console.log("EDIT SUCCESS");

                        //console.log("categories: ", this.loadedCategories);
                    }
                })
                .then(() => {
                    console.log("editStatus: ", editStatus);
                    if (editStatus) {
                        this.editCategoryId = 0;
                    }
                });

            this.loadeddetergentCategories = detergentsArray;
            this.loadedfabricCategories = fabricsArray;
            this.loadeddryerCategories = dryersArray;
            this.loadedscentCategories = scentsArray;
            this.loadedfreshenerCategories = freshenersArray;
        },
        deleteItem(event) {
            let deleteForm = $(event.target).parent();
            console.log("deleteForm: ", deleteForm);
            //console.log("deleteForm: ", deleteForm);
            let selectedType;
            let detergentsArray = this.loadeddetergentCategories;
            let fabricsArray = this.loadedfabricCategories;
            let dryersArray = this.loadeddryerCategories;
            let scentsArray = this.loadedscentCategories;
            let freshenersArray = this.loadedfreshenerCategories;
            let selectedArray;

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
                let freshenerURL = this.deleteformroutefreshener.replace(
                    "category_id",
                    categoryId
                );

                selectedType = $(deleteForm)
                    .find(".categoryType")
                    .val();

                console.log("selectedType: ", selectedType);
                if (selectedType == "detergent") {
                    selectedURL = detergentsURL;
                    selectedArray = detergentsArray;
                    //console.log("detergent");
                } else if (selectedType == "fabric") {
                    selectedURL = fabricURL;
                    selectedArray = fabricsArray;
                    //console.log("fabric");
                } else if (selectedType == "dryer") {
                    selectedURL = dryerURL;
                    selectedArray = dryersArray;
                    //console.log("dryer");
                } else if (selectedType == "scent") {
                    selectedURL = scentURL;
                    selectedArray = scentsArray;
                    //console.log("scent");
                } else if (selectedType == "freshener") {
                    selectedURL = freshenerURL;
                    selectedArray = freshenersArray;
                    //console.log("scent");
                } else {
                    //console.log("Not In IF");
                    //console.log(selectedType);
                }
                //console.log("selectedURL: ", selectedURL);

                // console.log("selectedURL : ", selectedURL);
                axios({
                    url: selectedURL,
                    method: "DELETE",
                    data: formValues
                })
                    .then(response => {
                        //console.log("data: ", response.data);
                        if (response.data.success) {
                            //console.log("DELETE SUCCESS");
                            //console.log("List: ", this.loadedCategories);
                            selectedArray = selectedArray.filter(
                                x => x.id != categoryId
                            );
                            console.log(response.data);
                            this.showSuccessMessage(response.data.message);
                        }
                    })
                    .then(() => {
                        console.log("selectedType: ", selectedType);
                        if (selectedType == "detergent") {
                            this.loadeddetergentCategories = selectedArray;
                        } else if (selectedType == "fabric") {
                            this.loadedfabricCategories = selectedArray;
                        } else if (selectedType == "dryer") {
                            this.loadeddryerCategories = selectedArray;
                        } else if (selectedType == "scent") {
                            this.loadedscentCategories = selectedArray;
                        } else if (selectedType == "freshener") {
                            this.loadedfreshenerCategories = selectedArray;
                        }
                    });
            }
        },
        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
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
            width: 100%;
            height: 90px;
            margin: 20px 10px;
            padding: 0 30px;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 20px;

            .category-title {
                width: 100%;
                text-align: left;
                // margin: 20px auto;
                font-size: 20px;
            }
            .button {
                width: 150px;
                margin: 2px auto;
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
