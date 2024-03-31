import axiosClient from './axiosClient';

const userApi = {
  getAllUsers() {
    return axiosClient('/users');
  },
};

export default userApi;
