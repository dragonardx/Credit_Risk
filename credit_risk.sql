CREATE TABLE `credit_risk`.`companies`
(
    `SessionID` VARCHAR(100) NOT NULL,
    `ID`        INT          NOT NULL,
    `Field1`    INT NULL,
    `Field2`    INT NULL,
    `Field3`    INT NULL,
    `Field4`    INT NULL,
    `Field5`    INT NULL,
    `Field6`    INT NULL,
    `Field7`    INT NULL,
    `Field8`    INT NULL,
    `Field9`    INT NULL,
    `Field10`   INT NULL,
    `Date`      DATE         NOT NULL,
    `Model`     CHAR(10)     NOT NULL,
    `Factor1`   INT NULL,
    `Factor2`   INT NULL,
    `Factor3`   INT NULL,
    `Factor4`   INT NULL,
    `Factor6`   INT NULL,
    `Factor7`   INT NULL,
    `LPT`       INT NULL,
    `BEH`       INT NULL,
    `FIN`       INT NULL,
    `TOTAL`     INT          NOT NULL,
    UNIQUE `SessionID` (`SessionID`)
)