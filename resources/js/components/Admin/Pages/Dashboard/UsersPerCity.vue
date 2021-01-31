<template>
    <div class="UsersPerCity">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="flex-container">
            <input
                type="text"
                class="city-search"
                v-model="searchCityName"
                @input="searchForCity"
                placeholder="Search"
                tabindex="0"
            />
            <div class="flex-column">
                <p class="search-not-found" v-if="loadedCities.length == 0">
                    No cities found
                </p>
                <div
                    class="city-user"
                    :id="city.id"
                    :class="activecityid == city.id ? 'active' : ''"
                    v-for="city in loadedCities"
                    :key="city.id"
                    @click="loadActiveCityUsers(city.id)"
                >
                    <input class="city-radio" type="radio" name="city" />
                    <p class="city-name" style="margin-left: 20px">
                        {{ city.name }}
                    </p>
                </div>
            </div>
            <div class="packages-users-card" v-if="cityusers.length">
                <!-- Users table -->
                <div style="display: flex; flex-direction: row;">
                    <p class="table-title" style="width: 230px">Sales Per {{ selectedCity }}</p>
                    <p class="table-title" style="margin-left: 100px">Total: {{selectedCitySales}}</p>
                </div>

                <div class="date-users-table" v-if="cityusers.length">
                    <table class="new-clients-table" id="newClientsTable">
                        <thead>
                            <tr>
                                <th class="username-head" data-order="asc">
                                    <div class="table-head-flex">
                                        <p class="title">Username</p>
                                        <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        />
                                    </div>
                                </th>
                                <th class="package-head">
                                    <div class="table-head-flex">
                                        <p class="title">Subscription Date</p>
                                        <!-- <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        /> -->
                                    </div>
                                </th>
                                <th class="zipcode-head">
                                    <div class="table-head-flex">
                                        <p class="title">Zip Code</p>
                                        <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        />
                                    </div>
                                </th>
                                
                                <th class="phone-head">
                                    <div class="table-head-flex">
                                        <p class="title">Phone</p>
                                        <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        />
                                    </div>
                                </th>
                                <th class="package-head">
                                    <div class="table-head-flex">
                                        <p class="title">Service Status</p>
                                        <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        />
                                    </div>
                                </th>
                                <th class="package-head">
                                    <div class="table-head-flex">
                                        <p class="title">Completion Date</p>
                                        <img
                                            src="/images/admin/icons/reports.svg"
                                            alt=""
                                            class="table-head-icon"
                                        />
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="user in cityusers" :key="user.id">
                                <td class="username-cell">
                                    <p
                                        class="link"
                                        @click="goToShowUser(user.id)"
                                    >
                                        {{ user.name }}
                                    </p>
                                </td>
                                <td class="city-cell">{{ user.subscription_date }}</td>
                                <td class="city-cell">{{ user.zipcode }}</td>
                                <td class="phone-cell">{{ user.phone }}</td>
                                <td class="package-cell">
                                    {{ user.service_status }}
                                </td>
                                <td class="package-cell">
                                    {{ user.completion_date }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["title", "date", "cities", "users", "showuserroute"],
    data() {
        return {
            loadedCities: this.cities,
            activecityid: 0,
            cityusers: [],
            selectedCity: "",
            searchCityName: "", // for searching
            searchCities: [],
            selectedCitySales: 0
        };
    },
    mounted() {
        $(".city-search").focus();
    },
    methods: {
        getCityUsersCount(cityId) {
            let cities = this.loadedCities;
            let users = this.users;
            let count = 0;
            for (let index = 0; index < cities.length; index++) {
                users.forEach(function(user, index) {
                    if (user.city_id == cityId) {
                        count++;
                    }
                });
                return count;
            }
        },
        loadActiveCityUsers(clickedCityId) {
            this.activecityid = clickedCityId;
            let cities = this.loadedCities;
            let users = this.users;
            let cityUsersArray = [];
            // get users of the city
            for (let index = 0; index < cities.length; index++) {
                users.forEach(function(user, index) {
                    if (user.city_id == clickedCityId) {
                        if (cityUsersArray.indexOf(user) == -1) {
                            cityUsersArray.push(user);
                        }
                    }
                });
            }
            this.cityusers = cityUsersArray;
            $(`#${clickedCityId}`)
                .find(".city-radio")
                .trigger("click");
            let selectedCityName = $(`#${clickedCityId}`)
                .find(".city-name")
                .text();
            this.selectedCity = selectedCityName;
            /* show total of sales */
            let citySales = cities.find(x=>x.id == this.activecityid).sales
            if (citySales > 0) {
                this.selectedCitySales = citySales
            } else {
                
                this.selectedCitySales = 0
            }
        },
        goToShowUser(id) {
            let url = this.showuserroute.replace("user_id", id);
            window.location.href = url;
        },
        searchForCity() {
            let cityName = this.searchCityName.toLowerCase();
            let allCities = this.loadedCities;
            this.searchCities = [];
            if (cityName.length > 0) {
                allCities.forEach((city, index) => {
                    let currentCityName = city.name.toLowerCase();
                    if (currentCityName.search(cityName) >= 0) {
                        this.searchCities.push(city);
                    }
                });
                this.loadedCities = this.searchCities;
            } else {
                /* load all cities */
                this.loadedCities = this.cities;
            }
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;

.UsersPerCity {
    width: 100%;
    height: 100%;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0 10px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }

    .flex-container {
        width: 100%;
        margin: 10px auto;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        .city-search {
            border: 1px solid #ddd;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 12px;
            width: 250px;
        }
        .flex-column {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            height: 400px;
            width: 250px;
            overflow-y: auto;
            background: #f9f9f9;
            position: relative;
            .search-not-found {
                text-align: center;
                color: #aaa;
                width: 100%;
                margin: 10px auto;
            }

            .city-user {
                margin: 8px 0;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                color: $black;
                &.active {
                    color: $blue !important;
                }
                .city-name {
                    font-family: "Open-Sans-Semibold";
                    font-size: 16px;
                }
                .users-count {
                    margin-left: 20px;
                    font-family: "Open-Sans-Bold";
                    font-size: 16px;
                }
            }
        }
        .users-card {
            width: 444px;
            height: fit-content;
            box-shadow: 0px 0px 6px #0000001a;
            border: 2px solid #e8ecf3;
            margin-left: 200px;
            padding: 16px 24px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
            max-height: 450px;
            overflow-y: auto;
            .user-container {
                width: 100%;
                height: 40px;
                display: flex;
                justify-content: flex-start;
                align-items: center;
                font-size: 15px;
                font-family: "Open-Sans-Regular";
                color: $text-grey;
                border-bottom: 1px solid #eef2f4;
                .card-title {
                    font-family: "Open-Sans-Regular";
                    color: $text-grey;
                    height: 30px;
                    padding-bottom: 5px;
                }
                .username {
                    font-size: 13px;
                    font-family: "Open-Sans-Bold";
                    color: $blue;
                    cursor: pointer;
                    height: 35px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-start;
                    justify-content: center;
                }
            }
        }
    }

    .packages-users-card {
        width: calc(100% - 570px);
        height: fit-content;
        box-shadow: 0px 0px 6px #0000001a;
        border: 2px solid #e8ecf3;
        padding: 16px 24px;
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: flex-start;
        max-height: 450px;
        overflow-y: auto;
        margin-left: 260px;
        position: fixed;
        /* right: 150px; */

        .table-title {
            margin: 20px 0 10px 0;
            font-size: 18px;
            font-family: "Open-Sans-SemiBold";
        }
        .user-container {
            width: 100%;
            height: 40px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
            font-size: 15px;
            font-family: "Open-Sans-Regular";
            color: $text-grey;
            border-bottom: 1px solid #eef2f4;
            .card-title {
                font-family: "Open-Sans-Regular";
                color: $text-grey;
                height: 30px;
                padding-bottom: 5px;
            }
            .username {
                font-size: 13px;
                font-family: "Open-Sans-Bold";
                color: $blue;
                cursor: pointer;
                height: 35px;
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: center;
            }
        }

        .date-users-table {
            width: 100%;

            .date-title {
                margin-top: 20px;
                text-align: left;
                font-size: 21px;
                font-family: "Open-Sans-SemiBold";
                .date-sales-count {
                    margin-left: 100px;
                }
            }

            .new-clients-table {
                width: 100%;
                border-collapse: collapse;
                margin: 0 auto 10px auto;
                th,
                td {
                    margin: 0;
                    border-bottom: 1px solid $light-grey;
                    text-align: left;
                    padding: 12px 0;
                }
                th {
                    color: $text-grey;
                    font-size: 16px;
                    font-family: "Open-Sans-Regular";
                    font-weight: lighter;
                }
                td {
                    font-size: 14px;
                }

                .table-head-flex {
                    display: flex;
                    flex-direction: row;
                    justify-content: flex-start;
                    align-items: center;

                    .table-head-icon {
                        margin-left: 10px;
                    }
                }
                .username-head {
                    width: 150px;
                    position: relative;
                }
                .username-cell {
                    color: $blue;
                    font-family: "Open-Sans-Semibold";
                    .link {
                        cursor: pointer;
                    }
                }
                .zipcode-head {
                    width: 120px;
                }
                .phone-head {
                    width: 100px;
                }
                .package-head {
                    width: 160px;
                }
                .orders-head {
                    width: 100px;
                }
            }
        }
    }
}
</style>
