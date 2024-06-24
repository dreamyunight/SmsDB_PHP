# SmsDB_PHP

功能介绍：

主要实现了对于学生和老师的管理，以下为主要功能：

学生管理

- 新增学生
- 查询学生以及修改学生信息
- 查询以及增加和删除学生获奖信息
  1. 输入信息点击查询按钮即可查询学生信息，后面带有修改选项，点击修改即可修改学生获奖信息
  2. 点击新增即可增加学生获奖信息

教师管理

- 查询老师以及修改授课信息
- 查询教师发表期刊信息

学生选课

- 查询学生并修改选课信息（增加或者查询后修改）
- 查询学生选课对应的成绩

系统设置

- 修改学生密码（输入账号后输入新密码即可修改密码，不需要对照原密码）
- 修改教师密码（同上）

执行建表命令

```sql
CREATE TABLE dept (
    Dno VARCHAR(10) PRIMARY KEY,
    Dname VARCHAR(30) NOT NULL
);

CREATE TABLE major (
    Mno VARCHAR(10) PRIMARY KEY,
    Mname VARCHAR(30) NOT NULL,
    Dno VARCHAR(10),
    FOREIGN KEY (Dno) REFERENCES dept(Dno)
);

CREATE TABLE classes (
    Clsno VARCHAR(10) PRIMARY KEY,
    clsname VARCHAR(10) NOT NULL,
    Clssize INT,
    Mno VARCHAR(10),
    FOREIGN KEY (Mno) REFERENCES major(Mno)
);

CREATE TABLE student (
    Sno VARCHAR(12) PRIMARY KEY,
    Sname VARCHAR(10) NOT NULL,
    Ssex VARCHAR(1) NOT NULL,
    Sdate DATE,
    Semail VARCHAR(30),
    Dno VARCHAR(10),
    Mno varchar(10),
    Clsno VARCHAR(10),
    FOREIGN KEY (Dno) REFERENCES dept(Dno),
    FOREIGN KEY (Mno) REFERENCES major(Mno),
    FOREIGN KEY (Clsno) REFERENCES classes(Clsno)
);

CREATE TABLE course (
    Cno VARCHAR(6) PRIMARY KEY,
    Cname VARCHAR(15) NOT NULL,
    Ccredit DECIMAL(2,1) NOT NULL
);

CREATE TABLE teacher (
    Tno VARCHAR(10) PRIMARY KEY,
    Tpassword VARCHAR(18) NOT NULL,
    Tname VARCHAR(30) NOT NULL,
    Dno VARCHAR(10),
    FOREIGN KEY (Dno) REFERENCES dept(Dno)
);

CREATE TABLE giveLessons (
    Cno VARCHAR(6),
    Tno VARCHAR(10),
    startDate DATE,
    PRIMARY KEY (Cno, Tno),
    FOREIGN KEY (Cno) REFERENCES course(Cno),
    FOREIGN KEY (Tno) REFERENCES teacher(Tno)
);

CREATE TABLE electives (
    Cno VARCHAR(6),
    Sno VARCHAR(12),
    grade INT,
    PRIMARY KEY (Cno, Sno),
    FOREIGN KEY (Cno) REFERENCES course(Cno),
    FOREIGN KEY (Sno) REFERENCES student(Sno)
);

CREATE TABLE awd (
    Awdid INT PRIMARY KEY AUTO_INCREMENT,
    Awdname VARCHAR(30) NOT NULL,
    Sno VARCHAR(12),
    FOREIGN KEY (Sno) REFERENCES student(Sno)
);

CREATE TABLE honors (
    Honid INT PRIMARY KEY AUTO_INCREMENT,
    Honname VARCHAR(30) NOT NULL
);

CREATE TABLE public (
    pubId INT PRIMARY KEY AUTO_INCREMENT,
    pubName VARCHAR(30) NOT NULL,
    Tno VARCHAR(10),
    FOREIGN KEY (Tno) REFERENCES teacher(Tno)
);

CREATE TABLE sci (
    pubId INT,
    sciId INT PRIMARY KEY AUTO_INCREMENT,
    scino VARCHAR(30) NOT NULL,
    FOREIGN KEY (pubId) REFERENCES public(pubId)
);
```

e-r图

```mermaid
erDiagram
    course["课程"] {
        varchar(6) Cno "课程编号 主键"
        varchar(15) Cname "课程名"
        numeric(2-1) Ccredit "学分值"
    }
    giveLessons["<授课>"] {
        varchar(6) Cno "课程编号 外键"
        varchar(10) Tno "教师编号 外键"
        date startDate "开课日期"
    }
    teacher["教师"] {
        varchar(10) Tno "教师编号"
        varchar(18) Tpassword "账号密码" 
        varchar(30) Tname "教师姓名"
        varchar(10) Dno "系编号 外键"
    }
    dept["学院"] {
        varchar(10) Dno "系编号 主键"
        varchar(30) Dname "系名"
    }
    major["专业"] {
        varchar(10) Mno "专业编号"
        varchar(30) Mname "专业名"
        varchar(10) Dno "系编号 外键"
    }
    classes["班级"] {
        varchar(10) Clsno "班级编号 主键"
        varchar(10) clsname "班级名"
        int Clssize "班级人数"
        varchar(10) Mno "专业编号 外键"
    }
    student["学生"] {
        varchar(12) Sno "学号"
        varchar(10) Sname "姓名"
        varchar(1) Ssex "性别"
        date Sdate "出生日期"
        varchar(30) Semail "电子邮件"
        varchar(10) Dno "所在系"
        varchar(10) Clsno "所在班"
    }
    electives["<选修>"] {
        varchar(6) Cno "课程编号 外键"
        varchar(12) Sno "学号 外键"
        int grade "考试得分"
    }
    awd["获奖"] {
        int Awdid "获奖编号 主键"
        varchar(30) Awdname "奖项名称"
        int Sid "学生编号 外键"
    }
    honors["奖项"] {
        int Honid "奖项编号 主键"
        varchar Honname "奖项名称"
    }
    public["发表"] {
        int pubId "发表编号 主键"
        varchar pubName "论文名称"
        varchar(10) Tno "教师编号 外键"
    }
    sci["期刊"] {
        int pubId "发表编号 外键"
        int sciId "期刊编号"
        varchar(10) scino "期刊名称"
    }
    course }|--|{ giveLessons : "多对多" 
    giveLessons }|--|{ teacher : "多对一"
    teacher ||--|{ public : "一对多"
    public }|--|{ sci : "多对多"
    teacher }|--|| dept : "一对多"
    student }|--|| classes : "多对一"
    classes }|--|| major : "多对一"
    major }|--|| dept : "多对一"
    course }|--|| electives : "多对一"
    electives }|--|{ student : "多对多"
    student ||--|{ awd : "一对多"
    awd }|--|| honors : "多对一"
```

