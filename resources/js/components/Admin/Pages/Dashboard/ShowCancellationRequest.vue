<template>
    <div class="ShowCancellationRequest">
        <form action="">
            <p class="title">Request for Cancellation</p>
            <div class="container">
                <div class="left">
                    <img
                        src="/images/icons/profile.svg"
                        alt=""
                        class="userimage"
                    />
                    <p class="username">{{ user[0].name }}</p>
                </div>

                <div class="right">
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-email.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">{{ user[0].email }}</p>
                        <p class="state red">Not Verified</p>
                    </div>
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-phone.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">{{ user[0].phone }}</p>
                        <p class="state green">Verified</p>
                    </div>
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-calendar.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">{{ user[0].birthday }}</p>
                    </div>
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-location.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">Pickup Location</p>
                        <p class="state">Residential</p>
                    </div>
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-location.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">Drop off Location</p>
                        <p class="state">Residential</p>
                    </div>
                    <div class="info-container">
                        <img
                            src="/images/admin/icons/profile-package.svg"
                            alt=""
                            class="icon"
                        />
                        <p class="value">
                            {{
                                user[0].package
                                    ? user[0].package
                                    : "No Package Subscribed"
                            }}
                        </p>
                    </div>

                    <div class="buttons">
                        <div class="seperator"></div>

                        <button class="btn red">Chat</button>
                        <button class="btn orange">Previous Orders</button>
                        <button class="btn red">Current Orders</button>
                    </div>
                    <div class="seperator"></div>
                    <div class="cancellation-reason">
                        <p class="title">
                            Reason for Cancellation (Entered by the customer)
                        </p>
                        <textarea
                            readonly
                            class="textarea"
                            name=""
                            id=""
                            cols="30"
                            rows="4"
                        ></textarea>
                    </div>

                    <div class="seperator"></div>
                    <div class="cancellation-action">
                        <p class="title">Action</p>
                        <div class="flex-column">
                            <div
                                class="action"
                                v-for="action in actions"
                                :key="action.id"
                            >
                                <input
                                    class="action-radio"
                                    type="radio"
                                    name="city"
                                    :value="action.id"
                                    :id="action.id"
                                />
                                <p
                                    class="action-name"
                                    style="margin-left: 20px"
                                    @click="selectAction(action.id)"
                                >
                                    {{ action.name }}
                                </p>
                            </div>
                        </div>

                        <div class="info-container">
                            <img
                                src="/images/admin/icons/profile-wallet.svg"
                                alt=""
                                class="icon"
                            />
                            <p
                                class="value green"
                                :class="user[0].wallet < 0 ? 'red' : ''"
                            >
                                {{ user[0].wallet }} {{ user[0].currency }}
                            </p>
                            <p
                                class="edit-wallet"
                                @click="modalstate = !modalstate"
                            >
                                Edit Wallet
                            </p>
                        </div>
                    </div>

                    <div class="seperator"></div>

                    <div class="cancellation-reason">
                        <p class="title">
                            Comments (Entered by Authorized Admin)
                        </p>
                        <textarea
                            class="textarea"
                            name=""
                            id=""
                            cols="30"
                            rows="4"
                        ></textarea>
                    </div>

                    <Wallet-Modal v-show="modalstate" @hide-modal="hidemodal" />

                    <!-- Save Button -->

                    <div class="button-container">
                        <button class="save-button">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import WalletModal from "./Components/WalletModal";
export default {
    data() {
        return {
            modalstate: false,
            actions: [
                { id: "1", name: "Pending" },
                { id: "2", name: "Approve & Refund" },
                { id: "3", name: "Approved with E‐Wallet Credit" },
                { id: "4", name: "Approved with No Refund" },
                { id: "5", name: "Reject & terminate subscription" },
                { id: "6", name: "Reject & continue subscription" },
                { id: "7", name: "Service Modified" }
            ]
        };
    },
    props: {
        user: Array,
        editwalletroute: String
    },
    components: {
        WalletModal
    },
    methods: {
        selectAction(actionId) {
            let selectedActions = $(".action .action-radio");
            selectedActions.each(function(index, action) {
                if (action.id == actionId) $(action).trigger("click");
            });
        },
        hidemodal() {
            this.modalstate = false;
        }
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
$orange: #ffa800;

.ShowCancellationRequest {
    width: 100%;
    min-height: 100%;
    padding: 26px 0 0 0;

    .title {
        font-size: 21px;
        font-family: "Open-Sans-SemiBold";
    }
    .container {
        display: grid;
        grid-template-columns: 300px 1fr;
        justify-content: flex-start;
        align-content: flex-start;
        .left {
            .userimage {
                width: 140px;
                height: 140px;
                border-radius: 70px;
                margin-top: 24px;
            }
            .username {
                font-family: "Open-Sans-Bold";
                font-size: 21px;
                color: $black;
                margin-top: 16px;
            }
        }
        .right {
            .info-container {
                display: flex;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                margin-top: 40px;
                position: relative;
                .icon {
                    width: 30px;
                    height: 30px;
                    margin-right: 24px;
                }
                .value {
                    font-family: "Open-Sans-Semibold";
                    font-size: 18px;
                    color: $black;
                    /* for wallet */
                    &.green {
                        color: $green;
                    }
                    &.red {
                        color: $red !important;
                    }
                }
                .state {
                    position: absolute;
                    left: 450px;
                    font-family: "Open-Sans-Semibold";
                    &.green {
                        color: $green;
                    }
                    &.red {
                        color: $red !important;
                    }
                }
                .edit-wallet {
                    margin-left: 66px;
                    font-size: 14px;
                    color: $blue;
                    cursor: pointer;
                }
            }
            .seperator {
                width: 644px;
                height: 1px;
                background: $blue;
                margin: 39px 0;
            }
            .buttons {
                margin: 40px auto;
                .btn {
                    width: 200px;
                    padding: 10px 0;
                    background: #fff;
                    font-family: "Open-Sans-Bold";
                    font-size: 16px;
                    border-radius: 20px;
                    margin-right: 20px;
                    &.red {
                        color: $red;
                        border: 2px solid $red;
                    }
                    &.orange {
                        color: $orange;
                        border: 2px solid $orange;
                    }
                }
            }

            .textarea {
                border: 3px solid #222;
                margin: 20px 0;
                padding: 20px;
                width: 100%;
                border-radius: 15px;
                background: #eee;
                resize: none;
                font-size: 20px;
            }

            .cancellation-action {
                .flex-column {
                    display: flex;
                    flex-direction: column;
                    justify-content: flex-start;
                    align-items: flex-start;
                    margin: 10px 0;
                    .action {
                        margin: 8px 0;
                        display: flex;
                        flex-direction: row;
                        justify-content: flex-start;
                        color: $black;
                        &.active {
                            color: $blue !important;
                        }
                        .action-name {
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
            }
            .button-container {
                display: flex;
                justify-content: center;
                align-items: center;
                width: 100%;
                margin: 30px auto;
                .save-button {
                    margin: 30px auto;
                    padding: 10px 40px;
                    height: 45px;
                    border-radius: 25px;
                    background: $blue;
                    color: #fff;
                    font-size: 18px;
                }
            }
        }
    }
}
</style>
