<template>
    <form :action="formactionroute" method="post">
        <input type="hidden" :value="csrf" name="_token" />
        <input type="hidden" name="stars" :value="rate" />

        <div class="OrderRate">
            <p class="title">Order Rate</p>
            <div class="order-stars">
                <img
                    @click="changeRate(1)"
                    class="star"
                    :class="rate > 0 ? 'full' : ''"
                    :src="
                        rate > 0
                            ? '/images/icons/star-full.svg'
                            : '/images/icons/star.svg'
                    "
                    alt=""
                />
                <img
                    @click="changeRate(2)"
                    class="star"
                    :class="rate > 1 ? 'full' : ''"
                    :src="
                        rate > 1
                            ? '/images/icons/star-full.svg'
                            : '/images/icons/star.svg'
                    "
                    alt=""
                />
                <img
                    @click="changeRate(3)"
                    class="star"
                    :class="rate > 2 ? 'full' : ''"
                    :src="
                        rate > 2
                            ? '/images/icons/star-full.svg'
                            : '/images/icons/star.svg'
                    "
                    alt=""
                />
                <img
                    @click="changeRate(4)"
                    class="star"
                    :class="rate > 3 ? 'full' : ''"
                    :src="
                        rate > 3
                            ? '/images/icons/star-full.svg'
                            : '/images/icons/star.svg'
                    "
                    alt=""
                />
                <img
                    @click="changeRate(5)"
                    class="star"
                    :class="rate > 4 ? 'full' : ''"
                    :src="
                        rate > 4
                            ? '/images/icons/star-full.svg'
                            : '/images/icons/star.svg'
                    "
                    alt=""
                />
            </div>
            <div class="order-feedback">
                <textarea
                    name="feedback"
                    placeholder="Leave your Feedback"
                    class="feedback-text-area"
                    rows="5"
                ></textarea>
            </div>
            <div class="feedback-button-container">
                <!-- <button class="feedback-action-button" type="submit"> -->
                <button
                    class="btn btn-primary px-4 py-2 mb-4 text-capitalize"
                    style="border-radius: 20px"
                >
                    Submit
                </button>
            </div>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    props: ["formactionroute", "rate"],
    methods: {
        changeRate(index) {
            this.rate = index;
        }
    }
};
</script>

<style lang="scss">
$white: #ffffff;
$dark-white: #f1f1f1;
$black: #000000;
$blue: #22aee4;
$grey: #00000099;
$shadow: 0px 0px 10px #0000001a;

.OrderRate {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    width: 444px;
    height: 358px;
    background: $white;
    border: 1px solid #e7e7e7;
    border-radius: 25px;
    box-shadow: $shadow;
    padding: 24px;
    .title {
        font-family: "Lato-Bold";
        font-size: 18px;
        color: $blue;
        margin-bottom: 24px;
    }
    .order-stars {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        width: 168px;
        height: 35px;
        margin: 12px auto 36px auto;
        display: flex;
        .star {
            margin: 0 5px;
        }
    }
    .order-feedback {
        width: 100%;
        .feedback-text-area {
            width: 100%;
            height: 118px;
            border-radius: 25px;
            padding: 14px 24px;
            font-size: 14px;
            margin: 5px 0;
            resize: none;
            background: $dark-white;
        }
    }
    .feedback-button-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        margin-top: 24px;
        width: 100%;
        .feedback-action-button {
            width: 160px;
            height: 30px;
            border-radius: 35px;
            background: $blue;
            color: $white;
            font-size: 15px;
        }
    }
}
</style>
