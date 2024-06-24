package week5;

public abstract class EmployeeDecorator implements Employee {
    protected Employee employee;

    public EmployeeDecorator(Employee employee) {
        this.employee = employee;
    }

    public void doTask() {
        employee.doTask();
    }

    public void join(String time) {
        employee.join(time);
    }

    public void terminate(String time) {
        employee.terminate(time);
    }
}