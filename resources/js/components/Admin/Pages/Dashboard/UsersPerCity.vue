<template>
    <div class="UsersPerCity">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="flex-container">
            <div class="flex-column">
                <div
                    class="city-user"
                    :id="city.id"
                    :class="activecityid == city.id ? 'active' : ''"
                    v-for="city in cities"
                    :key="city.id"
                    @click="loadActiveCityUsers(city.id)"
                >
                    <input
                        class="city-radio"
                        type="radio"
                        name="city"
                    />
                    <p class="city-name" style="margin-left: 20px">
                        {{ city.name }}
                    </p>
                </div>
            </div>

            <div class="packages-users-card" v-if="cityusers.length">
                <!-- Users table -->
                <p class="table-title">Sales Per {{selectedCity}}</p>
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
            activecityid: 0,
            cityusers: [],
            selectedCity: '',
        };
    },
    methods: {
        mounted: function() {
            alert("Mounted");
            $(document).ready(function() {
                $(".city-name").click(function() {
                    $(this)
                        .parent()
                        .find(".city-radio")
                        .click();
                });
            });
        },
        getCityUsersCount(cityId) {
            var cities = this.cities;
            var users = this.users;
            var count = 0;
            for (var index = 0; index < cities.length; index++) {
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

            var cities = this.cities;
            var users = this.users;
            var cityUsersArray = [];
            // get users of the city
            for (var index = 0; index < cities.length; index++) {
                users.forEach(function(user, index) {
                    if (user.city_id == clickedCityId) {
                        if (cityUsersArray.indexOf(user) == -1) {
                            cityUsersArray.push(user);
                        }
                    }
                });
            }

            this.cityusers = cityUsersArray;
            $(`#${clickedCityId}`).find('.city-radio').attr('checked', true)
            let selectedCityName = $(`#${clickedCityId}`).find('.city-name').text()
            this.selectedCity = selectedCityName
},
        goToShowUser(id) {
            var url = this.showuserroute.replace("user_id", id);
            window.location.href = url;
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
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        align-items: flex-start;
        .flex-column {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: flex-start;
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
        width: calc(100% - 580px);
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
        margin-left: 250px;
        position: fixed;
        /* right: 150px; */

        .table-title{
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
