// import axios from 'axios'
import { useNotificationStore } from '@/scripts/stores/notification'
const { defineStore } = window.pinia

export const useWhiteLabelStore = defineStore({
  id: 'white-label',
  actions: {
    updateLogo(data) {
      const notificationStore = useNotificationStore(true)
      return new Promise((resolve, reject) => {
        window.axios
          .post('/api/m/white-label/upload-logos', data)
          .then((response) => {
            resolve(response)
          })
          .catch((err) => {
            reject(err)
          })
      })
    },
  },
})
