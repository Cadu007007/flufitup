<template>
    <div class="Zones">
        <div class="page-header">
            <p class="title">{{ title }}</p>
            <p class="date">{{ date }}</p>
        </div>
        <ZoneContainer
            v-for="zone in loadedZones"
            :key="zone.id"
            :name="zone.name"
            :cities="zone.cities"
            @go-to-edit-zone="goToEditZone(zone.id)"
            @delete-zone="showDeleteModal(zone.id)"
        />
        <img
            src="/images/admin/icons/zones-add-icon.svg"
            @click="goToAddZone"
            alt=""
            class="add-zone"
        />
    </div>
</template>

<script>
import ZoneContainer from "./Components/ZoneContainer";
export default {
    data(){
        return{
            loadedZones: this.zones
        }
    },
    components: {
        ZoneContainer
    },
    props: [
        "title",
        "date",
        "zones",
        "addzoneroute",
        "editzoneroute",
        "deletezoneroute"
    ],
    methods: {
        goToAddZone() {
            window.location.href = this.addzoneroute;
        },
        goToEditZone(id) {
            var url = this.editzoneroute.replace("zone_id", id);
            window.location.href = url;
        },
        showDeleteModal(id) {
            if (confirm("Are you sure ?")) {
                let selectedURL = this.deletezoneroute.replace('zone_id', id)
                axios({
                    url: selectedURL,
                    method: "DELETE",
                    data: id
                }).then(response => {
                    if (response.data.success) {
                        this.loadedZones = this.loadedZones.filter(
                            x => x.id != id
                        );
                    }
                });
            }
        }
    }
};
</script>

<style lang="scss">
$text-grey: #00000066;

.Zones {
    width: 100%;
    height: 80vh;
    .page-header {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        .title {
            margin: 26px 0;
            font-size: 21px;
            font-family: "Open-Sans-SemiBold";
        }
        .date {
            font-size: 12px;
            color: $text-grey;
            font-family: "Open-Sans-Regular";
        }
    }
    .add-zone {
        position: fixed;
        bottom: 20px;
        right: 30px;
        cursor: pointer;
    }
}
</style>
