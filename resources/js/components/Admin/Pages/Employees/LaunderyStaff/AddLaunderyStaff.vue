<template>
    <div class="AddLaunderyStaff">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <form action="/dummy" method="post">
            <input type="hidden" :value="csrf" name="_token" />

            <div class="container">
                <div class="left">
                    <img
                        src="/images/icons/profile.svg"
                        alt=""
                        class="userimage"
                    />
                </div>

                <div class="right">
                    <div class="info-container">
                        <p class="title">Staff Name:</p>
                        <input
                            type="text"
                            class="input"
                            name="name"
                            placeholder="Name"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Birthday :</p>
                        <input
                            type="text"
                            class="input"
                            name="birthday"
                            placeholder="Birthday"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Phone Number :</p>
                        <input
                            type="text"
                            class="input"
                            name="phone"
                            placeholder="Phone Number"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Address :</p>
                        <input
                            type="text"
                            class="input"
                            name="address"
                            placeholder="Address"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">City:</p>
                        <input
                            type="text"
                            class="input"
                            name="city"
                            placeholder="City"
                        />
                    </div>
                    <div class="info-container">
                        <p class="title">State:</p>
                        <input
                            type="text"
                            class="input"
                            name="state"
                            placeholder="State"
                        />
                    </div>
                    <div class="info-container">
                        <p class="title">Zip Code:</p>
                        <input
                            type="text"
                            class="input"
                            name="zip_code"
                            placeholder="Zip Code"
                        />
                    </div>

                    <div class="info-container">
                        <p class="title">Email:</p>
                        <input
                            type="text"
                            class="input"
                            name="email"
                            placeholder="Email"
                        />
                    </div>
                </div>
            </div>
            <div class="seperator"></div>

            <LaunderyAssignments />

            <div class="seperator"></div>
            <AdminAuthorizations :superadmin="true" :readonly="false" />

            <div class="seperator"></div>

            <div class="buttons-container">
                <button class="button save">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
import AdminAuthorizations from "../Components/AdminAuthorizations";
import LaunderyAssignments from "./Components/LaunderyAssignments";

export default {
    props: ["title", "date"],
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    components: {
        AdminAuthorizations,
        LaunderyAssignments
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

.AddLaunderyStaff {
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
        .seperator{
    width: 100%;
    height: 1px;
    margin: 10px 0;
    background: #ccc;
}


    .container {
        width: 100%;
        display: grid;
        grid-template-columns: 200px 1fr;
        justify-content: flex-start;
        align-content: flex-start;
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
                margin: 20px auto;
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
        }
        .input {
            width: 400px;
            max-width: 628px;
            background: #f9f9f9;
            border: 2px solid #ededed;
            border-radius: 7px;
            padding: 12px;
            font-size: 14px;
            &.name-input {
                width: auto;
                margin: 10px auto;
            }
        }
    }
    .buttons-container {
        width: 100%;
        height: fit-content;
        margin-top: 20px;
        display: flex;
        justify-content: center;
        .button {
            width: 200px;
            height: 40px;
            margin: 20px;
            border-radius: 20px;
            font-size: 14px;
            font-family: "Open-Sans-Bold";
            background: #fff;
            color: #fff;
            background: $blue;
        }
    }
    .auth {
        .auth-title {
            color: $blue;
        }
    }
}
</style>
