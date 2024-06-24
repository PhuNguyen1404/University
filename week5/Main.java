package week5;

public class Main {
    public static void main(String[] args) {
        // Creating a Team Member
        System.out.println("A: TEAM MEMBER: ");
        System.out.println("----------");
        Employee teamMember = new TeamMember("MEMBER");
        teamMember.join("04/11/2018");
        teamMember.terminate("04/05/2019");
        teamMember.doTask();
        System.out.println(" ");

        // Creating a Team Leader
        System.out.println("B: TEAM LEADER: ");
        System.out.println("----------");
        Employee teamLeader = new TeamLeaderDecorator(new TeamMember("LEADER"));
        teamLeader.join("04/11/2018");
        teamLeader.terminate("04/05/2019");
        teamLeader.doTask();
        System.out.println(" ");

        // Creating a Manager
        System.out.println("C: MANAGER: ");
        System.out.println("----------");
        Employee manager = new ManagerDecorator(new TeamMember("MANAGER"));
        manager.join("04/11/2018");
        manager.terminate("04/05/2019");
        manager.doTask();
        System.out.println(" ");

        // Creating a Team Leader and Manager
        System.out.println("D: TEAM LEADER AND MANAGER: ");
        System.out.println("----------");
        Employee leaderAndManager = new ManagerDecorator(new TeamLeaderDecorator(new TeamMember("L&M")));
        leaderAndManager.join("04/11/2018");
        leaderAndManager.terminate("04/05/2019");
        leaderAndManager.doTask();

    }
}