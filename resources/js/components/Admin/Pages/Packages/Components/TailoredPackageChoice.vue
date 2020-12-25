<template>
    <div class="TailoredPackageChoice">
        <div class="choice">
            <input
                class="question-choice"
                type="text"
                name="choice"
                placeholder="Choice"
                :value="text"
            />
            <span class="delete" @click="$emit('delete-item')">
                <img src="/images/admin/icons/notification-cancel.svg" alt="" />
            </span>
        </div>
    </div>
</template>

<script>
export default {
    props: ["text"]
};
</script>

<style lang="scss">
.TailoredPackageChoice {
    margin-bottom: 10px;
    .choice {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        position: relative;
        margin-bottom: 10px;
    }
    
    .question-choice {
        width: 650px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
    }
    .delete {
        position: absolute;
        left: 670px;
    }
}
</style>
