// pages/index/index.js
Page({

  /**
   * 页面的初始数据
   */
  data: {

  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this;
    wx.request({
      url: 'http://127.0.0.1/fu/lian/web/index.php?r=img/apiimg', // 仅为示例，并非真实的接口地址
      success(res) {
        // console.log(res.data)
        that.setData({
          listArr:res.data
        })
      }
    }),
    wx.request({
      url: 'http://127.0.0.1/fu/lian/web/index.php?r=ify/apiify', // 仅为示例，并非真实的接口地址
      success(res) {
        console.log(res.data)
        that.setData({
          threeArr: res.data
        })
      }
    }),
    wx.request({
      url: 'http://127.0.0.1/fu/lian/web/index.php?r=good/apigoods', // 仅为示例，并非真实的接口地址
      success(res) {
        console.log(res.data)
        that.setData({
          goodsArr: res.data
        })
      }
    })
  },
  three:function(e){
    var that = this;
    
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