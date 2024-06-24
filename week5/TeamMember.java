package week5;

public class TeamMember implements Employee {
    private String name;
    
    public TeamMember(String name) {
        this.name = name;
    }

    public void doTask() {
        System.out.println(name + " is reporting the assigned task.");
    }

    public void join(String time) {
        System.out.println( name + " joined on " + time);
    }

    public void terminate(String time) {
        System.out.println(name + " terminated on " + time);
    }

    public void cooperate() {
        System.out.println(name + " is cooperating with others.");
    }
}
