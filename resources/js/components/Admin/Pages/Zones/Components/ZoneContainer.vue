<template>
    <div class="ZoneContainer">
        <p class="zone-title">Zone Name:</p>
        <p class="zone-name">{{ name }}</p>
        <div class="buttons-container">
            <p class="icon edit" @click="$emit('go-to-edit-zone')" title="Edit">
                <img src="/images/admin/icons/edit-icon.svg" />
            </p>
            <p class="icon delete" @click="$emit('delete-zone')" title="Delete">
                <img src="/images/admin/icons/delete-icon.svg" />
            </p>
        </div>
        <p class="zone-title">Zone Cities:</p>
        <p class="zone-city" v-if="cities.length > 0">{{ getNames(cities) }}</p>
        <p class="text-muted ml-4" v-else>Ther is no cities for that zone</p>
    </div>
</template>

<script>
export default {
    props: ["name", "cities", "editzoneroute", "deletezoneroute"],
    methods: {
        getNames(cities) {
            let names = "";
            for (let index = 0; index < cities.length; index++) {
                if (names.length > 0) {
                    names += ", ";
                }
                names += cities[index].name;
            }
            if (names.length == 0) {
                return "Not cities for this zone"
            }
            return names;
        }
    }
};
</script>

<style lang="scss">
$grey: #00000066;
$blue: #22aee4;
$black: #000000;

.ZoneContainer {
    display: grid;
    grid-template-columns: 100px auto 250px;
    align-items: flex-start;
    grid-template-rows: 40px 1fr;
    padding: 20px 30px 10px 90px;
    min-height: 100px;
    border-bottom: 1px solid #00000033;
    .buttons-container {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-start;
        .icon {
            margin: 5px 20px 0 20px;
            cursor: pointer;
        }
    }
    .zone-title {
        font-family: "Open-Sans-Regular";
        color: $grey;
        font-size: 16px;
    }
    .zone-name {
        margin-left: 30px;
        font-family: "Open-Sans-Bold";
        color: $blue;
        font-size: 16px;
    }
    .zone-city {
        margin-left: 30px;
        font-family: "Open-Sans-Bold";
        color: $black;
        font-size: 16px;
    }
}
</style>
