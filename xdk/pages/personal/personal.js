// pages/personal/personal.js
Page({
  formSubmit(e) {
    // console.log('form发生了submit事件，携带数据为：', e.detail.value)
    var formData = e.detail.value;
    var that =this;
    wx.request({
      url: 'http://127.0.0.1/fu/lian/web/index.php?r=sku/add', // 仅为示例，并非真实的接口地址
      data: {formData},
      method:"POST",
      success:function(res) {
        console.log(res);
        if(res.error){
          wx.showToast({
            title: 'res.data.msg',
            icon: 'none',
            duration: 2000
          })
        }else{
          wx.showToast({
            title: '成功',
            icon: 'success',
            duration: 2000,
            success:function(res){
              // console.log(res);
              // wx.navigateTo({
              //   url: '/pages/index/index',
              // })
            }
          })
        }
      }
    })
  },
  /**
   * 页面的初始数据
   */
  data: {

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})