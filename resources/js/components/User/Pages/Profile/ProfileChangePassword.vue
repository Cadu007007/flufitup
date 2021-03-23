<template>
    <div class="ProfileChangePassword">
        <div
            class="alert alert-success mt-3 text-center d-none successMessage"
        ></div>
        <div class="alert alert-danger mt-3 text-center d-none errorMessage"></div>
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>

        <form @submit="submitForm($event)">
            <div class="change-password-form-container">
                <input type="hidden" :value="csrf" name="_token" />

                <br />
                <Smart-Input-Container
                    title="Old Password"
                    inputName="old_password"
                    placeholder="Old Password"
                    type="password"
                    :isrequired="true"
                />
                <br />

                <Smart-Input-Container
                    title="New Password"
                    inputName="password"
                    placeholder="New Password"
                    type="password"
                    :isrequired="true"
                />
                <br />
                <Smart-Input-Container
                    title="Re-enter New Password"
                    inputName="password_confirmation"
                    placeholder="Re-enter New Password"
                    type="password"
                    :isrequired="true"
                />
            </div>

            <div class="button-container">
                <button type="submit" class="action-button">Change</button>
            </div>
        </form>
    </div>
</template>

<script>
import SmartInputContainer from "../../Components/SmartInputContainer";

export default {
    data() {
        return {
            title: "Change Password",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    props: ["date", "formactionroute"],
    components: {
        SmartInputContainer
    },
    methods: {
        submitForm(event) {
            event.preventDefault();

            let formData = $(event.target).serialize();

            axios({
                url: this.formactionroute,
                method: "POST",
                data: formData
            }).then(response => {
                console.log(response.data);
                if (response.data.success) {
                    this.showSuccessMessage(response.data.message);
                    this.clearInputs();
                } else {
                    this.showErrorMessage(response.data.messages);
                }
            });
        },
        showSuccessMessage(messageText) {
            $(".successMessage").removeClass("d-none");
            $(".successMessage").text(messageText);
            setTimeout(() => {
                $(".successMessage").addClass("d-none");
            }, 3000);
        },
        showErrorMessage(errors) {
            let errorsText = "";
            errors.forEach(error => {
                errorsText += error + '</br>';
            });
            console.log("errorsText: ", errorsText);
            $(".errorMessage").removeClass("d-none");
            $(".errorMessage").html(errorsText);
            setTimeout(() => {
                $(".errorMessage").addClass("d-none");
            }, 3000);
        }
    }
};
</script>
<style lang="scss">
$text-grey: #00000066;
$blue: #22aee4;
$white: #ffffff;

.ProfileChangePassword {
    padding: 0 140px 0 16px;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 12px;
            font-weight: bold;
        }
        .date {
            font-size: 10px;
            color: $text-grey;
        }
    }

    .change-password-form-container {
        width: 444px;
    }
    .button-container {
        width: 100%;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        .action-button {
            width: 200px;
            height: 40px;
            background: $blue;
            border-radius: 35px;
            font-size: 18px;
            color: $white;
        }
    }
}
</style>
