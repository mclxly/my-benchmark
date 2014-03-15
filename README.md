my-benchmark
============

目的: 测试不同解决方案/平台之间的性能差异。

背景
-------
* 测试平台1：CentOS6.5, PHP 5.5.7, Python 2.6, pycurl 7.19.0
* 目前主要关注语言为：PHP, JavaScript, Python, Go.

任务列表
-------
- [x] 创建repos
- [ ] 比较几种语言的网页下载速度
 - [x] PHP: 实现基于curl并行下载网页
 - [ ] Python: 实现基于curl并行下载网页
 - [ ] Python: 实现基于multithread pool并行下载网页
- [ ] normal **formatting**, @mentions, #1234 refs
- [ ] incomplete
- [x] completed

参考代码/工具
------------
1. [**pycurl**](http://pycurl.sourceforge.net)
2. [pycurl doc](http://pycurl.sourceforge.net/doc/index.html)
3. [Update to Python 3.0 on CentOS 6](http://toomuchdata.com/2014/02/16/how-to-install-python-on-centos)
