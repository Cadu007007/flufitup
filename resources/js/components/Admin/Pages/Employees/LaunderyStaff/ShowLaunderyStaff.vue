<template>
    <div class="ShowLaunderyStaff">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <div class="container">
            <div class="left">
                <img src="/images/icons/profile.svg" alt="" class="userimage" />
                <p class="username">{{ staff[0].name }}</p>
            </div>

            <div class="right">
                <div class="info-container">
                    <p class="title">Email:</p>
                    <p class="value">{{ staff[0].email }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Phone Number :</p>
                    <p class="value">{{ staff[0].phone }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Birthday :</p>
                    <p class="value">{{ staff[0].birthday }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Address :</p>
                    <p class="value">{{ staff[0].address }}</p>
                </div>
                <div class="info-container">
                    <p class="title">ID Type</p>
                    <select
                        name="id_type"
                        id=""
                        class="select2"
                        disabled
                        style="width: 300px"
                    >
                        <option
                            value="driver"
                            :selected="staff[0].id_type == 'driver'"
                            >Driver’s licenses</option
                        >
                        <option
                            value="employment"
                            :selected="staff[0].id_type == 'employment'"
                            >Employment Authorization Card</option
                        >
                        <option
                            value="passport"
                            :selected="staff[0].id_type == 'passport'"
                            >Passport</option
                        >
                        <option
                            value="green_card"
                            :selected="staff[0].id_type == 'green_card'"
                            >Green Card</option
                        >
                    </select>
                </div>
                <div class="info-container">
                    <p class="title">ID Number</p>
                    <p class="value">{{ staff[0].id_number }}</p>
                </div>

                <div class="info-container">
                    <p class="title">Date of joining:</p>
                    <p class="value">{{ staff[0].date_of_join }}</p>
                </div>
            </div>
        </div>
        <div class="seperator"></div>

        <div class="container">
            <p class="title">Assignments</p>

            <div class="right">
                <div class="info-container">
                    <p class="title">Job</p>
                    <p class="value">{{ staff[0].job }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Shift</p>
                    <p class="value">{{ staff[0].shift }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Assignment Date</p>
                    <p class="value">{{ staff[0].assignment_date }}</p>
                </div>
                <div class="info-container">
                    <p class="title">Admin</p>
                    <p class="value">{{ staff[0].admin }}</p>
                </div>
            </div>
        </div>
        <div class="seperator"></div>

        <!-- Financials -->
        <Financials :tips="20" :bonus="20" />

        <div class="seperator"></div>

        <div class="buttons-container">
            <button class="button edit" @click="goToEditStaff(staff[0].id)">
                Edit
            </button>
            <button class="button delete">Delete</button>
        </div>
    </div>
</template>

<script>
import Financials from "../../../Components/Financials";

export default {
    props: ["title", "date", "staff", "editstaffroute"],
    methods: {
        goToEditStaff(id) {
            var url = this.editstaffroute.replace("staff_id", id);
            window.location.href = url;
        }
    },
    components: {
        Financials
    }
};
</script>

<style lang="scss">
$text-grey: #00000080;
$light-grey: #eef2f4;
$blue: #22aee4;
$black: #000;
$green: #00c319;
$red: red;

.ShowLaunderyStaff {
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
    .container {
        width: 100%;
        display: grid;
        grid-template-columns: 200px 1fr;
        justify-content: flex-start;
        align-content: flex-start;
        .title {
            font-size: 16px;
            font-family: "Open-Sans-SemiBold";
            color: $blue;
        }
        .left {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            .userimage {
                width: 140px;
                height: 140px;
                border-radius: 70px;
            }
            .username {
                font-family: "Open-Sans-Bold";
                font-size: 21px;
                color: $black;
                margin-top: 16px;
            }
        }
        .right {
            margin-left: 60px;
            .info-container {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                margin: 12px auto;
                .title {
                    width: 150px;
                    font-size: 16px;
                    font-family: "Open-Sans-Semibold";
                    color: $text-grey;
                }
                .value {
                    font-family: "Open-Sans-Semibold";
                    font-size: 18px;
                    color: $black;
                }
                .edit-wallet {
                    margin-left: 66px;
                    font-size: 14px;
                    color: $blue;
                    cursor: pointer;
                }
            }
            .seperator {
                width: 444px;
                height: 1px;
                background: $blue;
                margin: 39px 0;
            }
        }
    }
    .buttons-container {
        width: 100%;
        height: fit-content;
        margin-top: 40px;
        display: flex;
        justify-content: center;
        .button {
            width: 170px;
            height: 40px;
            margin: 0 20px;
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

    .seperator {
        width: 100%;
        height: 1px;
        background: #ccc;
        margin: 20px auto;
    }

    /* financials style edit */
    .Financials .row {
        margin-left: 260px;
    }

    .Financials .title {
        color: $blue !important;
    }
}
</style>
