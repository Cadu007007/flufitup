<template>
    <div class="DetergentsTypeItem">
        <div class="row">
            <div class="image-container">
                <img src="" alt="" />

                <div class="cam-button">
                    <img
                        class="cam-icon"
                        src="/images/admin/icons/camera-icon.svg"
                        alt=""
                    />
                </div>
            </div>
            <div class="column">
                <input
                    class="household-input"
                    type="text"
                    name="label"
                    id=""
                    placeholder="Label"
                    :value="label"
                />
                <input
                    class="household-input"
                    type="text"
                    name="price"
                    id=""
                    placeholder="Price"
                    :value="price"
                />
                <span class="delete" @click="$emit('delete-item')">
                    <img
                        src="/images/admin/icons/notification-cancel.svg"
                        alt=""
                    />
                </span>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["label", "price"]
};
</script>

<style lang="scss">
.DetergentsTypeItem {
    margin-bottom: 10px;
    .row {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
    }
    .column {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-start;
        position: relative;
        margin-bottom: 10px;
    }
    .image-container {
        width: 76px;
        height: 102px;
        border: 1px solid #ccc;
        margin: 0 20px 10px 0;
        border-radius: 5px;
        position: relative;
        .cam-button {
            height: 30px;
            width: 100%;
            background: #00000066;
            position: absolute;
            bottom: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            .cam-icon {
                width: 24px;
                height: 24px;
            }
        }
    }
    .household-input {
        width: 512px;
        height: 45px;
        background: #f9f9f9;
        padding: 13px 24px;
        border: 1px solid #ededed;
        border-radius: 7px;
        margin: 6px 0;
    }
    .delete {
        position: absolute;
        top: 47px;
        left: 525px;
    }
}
</style>
